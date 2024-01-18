<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\PostCategory;
use App\Models\Testimonial;
use App\Models\Post;
use App\Models\Astrologer;
use App\Http\Controllers\States;
use App\Models\Page;
use App\Models\Popup;
use App\Models\Userdetail;

class Master_WebController extends Controller
{
    public function home_page(Request $request)
    {
        // $slider = Slider::where('status',1)->orderBy('serial_no','ASC')->get();
        if (auth()->user()) {
            $uid = auth()->user()->uid;
        }
        
        $user = '';
        if (!empty($uid)) {
            $user = Userdetail::where('uid', $uid)->first();
        }
        
        $popups = Popup::where('status',true)->get();
        $testimonials = Testimonial::where('status', 1)->orderBy('id', 'DESC')->get();
        $posts = Post::where('status', 1)->orderBy('id', 'DESC')->take(6)->get();
        $astrologers = Astrologer::where('status', true)->where('image', '!=', null)->orderBy('serial_no', 'DESC')->take(6)->get();
        return view('web.home', compact('user', 'testimonials', 'posts', 'astrologers','popups'));
    }
    
    public function about_page(Request $request)
    {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        $page_title = 'About Us';
        return view('web.about', compact('page_title', 'user'));
    }

    public function contact_page(Request $request)
    {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        $page_title = 'Contact Us';
        return view('web.contact', compact('user', 'page_title'));
    }

    public function blog_page(Request $request)
    {
        $max_post = 21;
        $posts = [];
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }

        if (!empty($request->search)) {
            $posts = Post::where('status', true)->where('title', 'LIKE', '%' . $request->search . '%')->paginate($max_post);
        } elseif (!empty($request->category_slug)) {
            $post_category = PostCategory::where('slug', $request->category_slug)->first();
            if (!empty($post_category)) {
                $posts = Post::where('status', true)->where('category', $post_category->name)->orderBy('id', 'DESC')->paginate($max_post);
            }
        } else {
            $posts = Post::where('status', true)->orderBy('id','DESC')->paginate($max_post);
        }
        $categories = PostCategory::where('status', true)->orderBy('name', 'ASC')->get();
        return view('web.blog', compact('user', 'posts', 'categories'));
    }

    public function blog_details_page(Request $request)
    {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        $categories = PostCategory::where('status', true)->orderBy('id', 'DESC')->get();
        $post = Post::where('slug', $request->slug)->first();
        $latest_posts = Post::where('slug', '!=', $request->slug)->where('status', true)->orderBy('id', 'DESC')->take(6)->get();
        if (!empty($post)) {
            return view('web.blog_details', compact('user', 'post', 'categories', 'latest_posts'));
        } else {
            return abort(404);
        }
    }

    public function talk_to_astrologer_page(Request $request)
    {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        
        if(!empty($request->search)){
            $astrologers = Astrologer::where('name', 'LIKE', '%' . $request->search . '%')->orderBy('serial_no', 'ASC')->take(100)->get();
        }else{

            $astrologers = Astrologer::orderBy('serial_no', 'ASC')->take(100)->get();
            // $astrologers = Astrologer::inRandomOrder()->take(100)->get();
        }
        
        return view('web.talk-to-astrologer', compact('user', 'astrologers'));
    }

    public function chat_with_astrologer_page(Request $request)
    {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        if(!empty($request->search)){
            $astrologers = Astrologer::where('name', 'LIKE', '%' . $request->search . '%')->orderBy('serial_no', 'ASC')->take(100)->get();
        }else{
            $astrologers = Astrologer::orderBy('serial_no', 'ASC')->take(100)->get();
            // $astrologers = Astrologer::inRandomOrder()->take(100)->get();
        }
        return view('web.chat-with-astrologer', compact('user', 'astrologers'));
    }

    public function register_as_astrologer_page(Request $request)
    {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        $states = States::list();
        $img_wh = '300x300';
        return view('web.register-as-astrologer', compact('user', 'states', 'img_wh'));
    }

    public function astrologer_profile_page($slug)
    {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        $data = Astrologer::where('slug', $slug)->first();
        if (!empty($data)) {
            return view('web.astrologer-profile', compact('data', 'user'));
        } else {
            return abort('404');
        }
    }


    public function city_page($slug)
    {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        $data = Page::where('slug', $slug)->first();
        if (!empty($data)) {
            return view('web.city-page', compact('data', 'user'));
        } else {
            return abort('404');
        }
    }
}
