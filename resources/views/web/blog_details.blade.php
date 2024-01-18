@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>{{ $post->title }} - {{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ $post->meta_description }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->description }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="article:publisher" content="https://www.facebook.com/astrologykart" />
    <meta property="article:published_time" content="{{ $post->created_at }}" />
    <meta property="article:modified_time" content="{{ $post->updated_at }}" />
    <meta property="og:image" content="{{ asset('assets/img/post/' . $post->image) }}" />
    <meta property="og:image:width" content="650" />
    <meta property="og:image:height" content="350" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@astrologykart" />
    <meta name="twitter:site" content="@astrologykart" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="{{ $post->author_name }}" />
    <meta name="twitter:label2" content="Est. reading time" />
    <meta name="twitter:data2" content="{{ rand(4, 10) }} minutes" />
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .blog__details--content p {
            text-align: justify;
            font-size: 1.6rem;
            line-height: 2.9rem;
            color: #1b1b1b;
            margin-bottom: 1.5rem;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            line-height: 5rem;
        }

        .breadcrumb__content--menu__items {
            font-size: 15px;
        }

        .entry__blog li {
            list-style: disc;
            line-height: 2;
            margin-left: 25px;
        }

        div#social-links {
            margin: 0 auto;
            max-width: 500px;
        }

        div#social-links ul li {
            display: inline-block;
        }

        div#social-links ul li a {
            padding: 5px;
            margin: 3px;
            font-size: 30px;
            color: var(--theme-color);
        }
    </style>
@endsection


@section('main-content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section border-bottom">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content py-4">
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class=""
                                    href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><a href="{{ route('blog.page') }}"
                                    class="">Blog</a></li>
                            <li class="breadcrumb__content--menu__items"><span
                                    style="
                                display: inline-block;
                                max-height: 20px;
                                overflow: hidden;
                                box-shadow: inset black;
                            ">{{ $post->title }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start blog details section -->
    <section class="blog__details--section pt-3 pt-sm-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-8">
                    <div class="blog__details--wrapper">
                        <div class="entry__blog">
                            <div class="blog__post--header mb-30">
                                <h2 class="post__header--title mb-15" style="line-height: 3.8rem">{{ $post->title }}</h2>
                                <p class="blog__post--meta">Posted by : {{ $post->author_name ?? 'Astrologykart.com' }} /
                                    Posted On : {{ Hpx::mydate_month($post->created_at) }} / Category : <a
                                        class="blog__post--meta__link"
                                        href="{{ route('blog_category.page', Str::slug($post->category)) }}">{{ $post->category }}</a>
                                </p>
                            </div>
                            <div class="blog__thumbnail mb-30 text-center">
                                @if (!is_dir('assets/img/post/' . $post->image) and file_exists('assets/img/post/' . $post->image))
                                    <img class="blog__thumbnail--img border-radius-10"
                                        src="{{ asset('assets/img/post/' . $post->image) }}" alt="{{ $post->title }}"
                                        title="{{ $post->title }}" />
                                @endif
                            </div>
                            <div class="blog__details--content">
                                {!! $post->content !!}
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-3 pb-5">
                            <div class="blog__social--media d-flex align-items-center">
                                <label class="blog__social--media__title">Share this Article :</label>
                                {!! Share::page(url()->current(), $post->title)->facebook()->twitter()->linkedin()->telegram()->whatsapp()->reddit() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="blog__sidebar--widget left widget__area">
                        <div class="single__widget widget__search widget__bg">
                            <h2 class="widget__title h3">Search Blog</h2>
                            <form class="widget__search--form" action="{{ route('blog.page') }}" method="GET">
                                <label>
                                    <input class="widget__search--form__input" name="search"
                                        value="{{ $_GET['search'] ?? null }}" placeholder="Search..." type="text">
                                </label>
                                <button type="submit" class="widget__search--form__btn" aria-label="search button">
                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                        width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                            stroke-width="32"></path>
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3">Recent Blogs</h2>
                            <div class="product__grid--inner">
                                @foreach ($latest_posts as $data)
                                    <div class="product__grid--items d-flex align-items-center">
                                        <div class="product__grid--items--thumbnail">
                                            <a class="product__items--link"
                                                href="{{ route('blog_details.page', $data->slug) }}">
                                                <img class="product__grid--items__img product__primary--img border-radius-5"
                                                    src="{{ Hpx::image_src('assets/img/post/thumbnail/' . $data->image, 'assets/web/img/blog/post-icon.jpg') }}"
                                                    alt="product-img">
                                            </a>
                                        </div>
                                        <div class="product__grid--items--content">
                                            <h3 class="product__grid--items--content__title h4"><a
                                                    href="{{ route('blog_details.page', $data->slug) }}">{{ Hpx::maxChar($data->title, 50) }}</a>
                                            </h3>
                                            <span class="meta__deta">{{ Hpx::mydate_month($data->created_at) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog details section -->
@endsection
