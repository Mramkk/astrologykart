@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <title>Astrology Blogs by Astrologykart | Vedic Astrology Blogs in English & Hindi</title>
    <meta name="description"
        content="Astrologykart is the famous astrology portal which provides the best astrologers to talk, to chat with and also to get astrology advice for free.">
    <meta name="keywords"
        content="Talk to best astrologer, talk to astrologer online, astrology advice, free astrologers online, chat with astrologers, Free horoscope online, astrology services">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="theme-color" content="#ff230b">
    <meta name="copyright" content="astrologykart">
    <meta property="og:site_name" content="Astrologykart">
    <meta property="og:type" content="website">
    <meta name="MobileOptimized" content="320">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('style')
    <style>
        .astro-categories a{
            display: block;
            padding: 0.5rem 0;
        }
    </style>
@endsection


@section('main-content')
    <!-- Start blog section -->
    <section class="blog__section section--padding pt-5">
        <div class="container-fluid">
            <div class="row row-md-reverse">
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="blog__sidebar--widget left widget__area" style="position: unset;">
                        <div class="single__widget widget__search widget__bg">
                            <h2 class="widget__title h3">Search Post</h2>
                            <form class="widget__search--form" action="{{ route('blog.page') }}" method="GET">
                                <label>
                                    <input class="widget__search--form__input" name="search"
                                        value="{{ $_GET['search'] ?? null }}" placeholder="Search..." type="text">
                                </label>
                                <button type="submit" class="widget__search--form__btn" aria-label="search button">
                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                        width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32">
                                        </path>
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <div class="single__widget widget__bg category_list">
                            <h2 class="widget__title h3 mb-0">Categories</h2>
                            <div class="product__grid--inner">
                                <div class="product__grid--items d-flex align-items-center">
                                    <div class="product__grid--items--content">
                                        <div class="product__grid--items--content__title h4 astro-categories">
                                            @foreach ($categories as $data)
                                                <a href="{{ route('blog_category.page', $data->slug) }}"><i
                                                        class="icofont-star"></i> {{ $data->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-8 col-lg-8">
                    <div class="blog__wrapper">
                        <div class="row mb--n30">
                            @forelse($posts as $data)
                                @php
                                    $post_link = route('blog_details.page', $data->slug);
                                @endphp
                                <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 custom-col mb-30">
                                    <div class="blog__items">
                                        <div class="blog__items--thumbnail">
                                            <a class="blog__items--link" href="{{ $post_link }}">
                                                <img class="blog__items--img bg-light"
                                                    src="{{ Hpx::image_src('assets/img/post/thumbnail/' . $data->image, 'assets/img/post/thumbnail/dummy.png') }}"
                                                    alt="{{ $data->title }}" title="{{ $data->title }}" />
                                            </a>
                                        </div>
                                        <div class="blog__items--content">
                                            <div class="blog__items--meta">
                                                <ul class="d-flex justify-content-between">
                                                    <li class="blog__items--meta__list">
                                                        <i class="icofont-user-alt-3 blog__items--meta__icon"></i>
                                                        <span
                                                            class="blog__items--meta__text">{{ $data->author_name }}</span>
                                                    </li>
                                                    <li class="blog__items--meta__list">
                                                        <svg class="blog__items--meta__icon"
                                                            xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                            viewBox="0 0 15 15">
                                                            <path
                                                                d="M75.809,63.836c0-.221,0-.429,0-.639a.915.915,0,0,0-.656-.869.959.959,0,0,0-1.057.321.97.97,0,0,0-.2.619v.559a.163.163,0,0,1-.164.161H72.716a.162.162,0,0,1-.164-.161c0-.192,0-.377,0-.564a.959.959,0,0,0-1.918-.06c-.005.206,0,.413,0,.62a.163.163,0,0,1-.164.161H69.428a.162.162,0,0,1-.164-.161,5.7,5.7,0,0,0-.009-.768.849.849,0,0,0-.627-.725.93.93,0,0,0-.942.185.952.952,0,0,0-.329.79c0,.175,0,.35,0,.533A.163.163,0,0,1,67.2,64H64.363a.162.162,0,0,0-.164.161V77.113a.163.163,0,0,0,.164.161H79.036a.162.162,0,0,0,.164-.161V64.158A.163.163,0,0,0,79.036,64H75.972A.161.161,0,0,1,75.809,63.836ZM68.7,76.636h-3.68a.162.162,0,0,1-.164-.161V73.913a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.561A.162.162,0,0,1,68.7,76.636Zm0-3.543H65.018a.162.162,0,0,1-.164-.161V70.224a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.708A.163.163,0,0,1,68.7,73.093Zm0-3.685H65.018a.162.162,0,0,1-.164-.161v-2.6a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.6A.162.162,0,0,1,68.7,69.408Zm4.9,7.23H69.71a.162.162,0,0,1-.164-.161V73.921a.163.163,0,0,1,.164-.161H73.6a.162.162,0,0,1,.164.161v2.557A.16.16,0,0,1,73.6,76.638Zm.172-3.632c0,.05-.077.089-.169.089h-3.9a.162.162,0,0,1-.164-.161v-2.71c0-.089.043-.163.093-.166l.093-.005c1.282,0,2.563,0,3.844,0,.155,0,.208.034.207.2-.007.89,0,1.783-.005,2.672A.747.747,0,0,1,73.776,73.006Zm.005-3.694c0,.05-.074.091-.164.091H69.707a.162.162,0,0,1-.164-.161V66.636c0-.089.043-.161.1-.161h.1c1.282,0,2.563,0,3.844,0,.155,0,.207.036.2.2-.007.852,0,1.7,0,2.552v.091Zm.823.756h3.772a.162.162,0,0,1,.164.161v2.706a.163.163,0,0,1-.164.161H74.6a.162.162,0,0,1-.164-.161V70.227A.162.162,0,0,1,74.6,70.068Zm3.773,6.568H74.6a.162.162,0,0,1-.164-.161V73.918a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.557A.158.158,0,0,1,78.377,76.636Zm0-7.233H74.6a.162.162,0,0,1-.164-.161V66.648a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.593A.159.159,0,0,1,78.377,69.4Z"
                                                                transform="translate(-64.2 -62.274)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                        <span
                                                            class="blog__items--meta__text">{{ Hpx::mydate_month($data->created_at) }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h3 class="blog__items--title fs-4" style="height: 57px;"><a
                                                    href="{{ $post_link }}">{{ Hpx::maxChar($data->title, 70) }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h5 class="text-center mt-5">No Match Found..!</h5>
                            @endforelse
                        </div>
                        <div class="col-12 mt-5">
                            {!! Hpx::paginator($posts) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog section -->
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('.category_list a[href="{{ url()->current() }}"]').css('color', 'var(--secondary-color)');
        });
    </script>
@endsection
