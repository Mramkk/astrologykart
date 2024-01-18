@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Online Astrologer Advice in India | Free Astrologer Advice Online </title>
    <meta name="description"
        content="Astrology Kart provides the topmost astrologers in different City of India under the one roof. Consult with the best astrologers online for good astrology advice.">
    <meta name="keywords"content="Astrology, astrologers, City wise astrologers, astrologer City wise, talk to astrologers City wise, free chat with astrologers City wie, daily horoscope.">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="theme-color" content="#ff230b">
    <meta name="copyright" content="astrologykart.com">
    <meta property="og:site_name" content="Astrologykart">
    <meta property="og:type" content="website">
    <meta name="MobileOptimized" content="320">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('style')
    <style>
        .list-group-item {
            padding: 12px 10px;
        }
        .list-group{
            border-radius: 0;
        }
        .list-group li{
            border: 0;
        }

    </style>
@endsection

@section('main-content')
    @include('web.includes.breadcrumb', ['page_title' => 'City Wise Astrologer'])
    <section class="">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ast_about_info">
                        <ul class="list-group">
                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-agra') }}"> Talk To Astrologer in
                                    Agra</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-ahmedabad') }}"> Talk To Astrologer in Ahemdabad</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-bangalore') }}"> Talk To Astrologer in Banglore</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-bhopal') }}">Talk To Astrologer in
                                    Bhopal</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-chennai') }}"> Talk To Astrologer in Chennai</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-delhi') }}">Talk To Astrologer in
                                    Delhi</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-gorakhpur') }}"> Talk To Astrologer in Gorakhpur</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-hyderabad') }}"> Talk To Astrologer in Hyderabad</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-indore') }}"> Talk To Astrologer in
                                    Indore</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-jaipur') }}"> Talk To Astrologer in
                                    Jaipur</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-kalyan') }}"> Talk To Astrologer in
                                    Kalyan</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-kanpur') }}"> Talk To Astrologer in
                                    Kanpur</a></li>
                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-kolkata') }}"> Talk To Astrologer in Kolkata</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-lucknow') }}"> Talk To Astrologer in Lucknow</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-ludhiana') }}"> Talk To Astrologer in Ludhiana</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-nashik') }}"> Talk To Astrologer in
                                    Nasik</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-patna') }}"> Talk To Astrologer in
                                    Patna</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-pimpiri') }}"> Talk To Astrologer in Pimpiri</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-pune') }}"> Talk To Astrologer in
                                    Pune</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-rajgarh') }}"> Talk To Astrologer in Rajgarh</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="ast_about_info">
                        <ul class="list-group">
                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-ranchi') }}"> Talk To Astrologer in
                                    Ranchi</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-surat') }}"> Talk To Astrologer in
                                    Surat</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-thane') }}"> Talk To Astrologer in
                                    Thane</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-vadodara') }}"> Talk To Astrologer in Vadodara</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-allahabad') }}"> Talk To Astrologer in Allahabad</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-bhubaneswar') }}"> Talk To Astrologer in Bhubaneswar</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-chandigarh') }}"> Talk To Astrologer in Chandigarh</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-dehradun') }}"> Talk To Astrologer in Dehradun</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-dhanbad') }}"> Talk To Astrologer in Dhanbad</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-gurgaon') }}"> Talk To Astrologer in Gurgaon</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-guwahati') }}"> Talk To Astrologer in Guwahati</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-kota') }}"> Talk To Astrologer in
                                    Kota</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-mangalore') }}"> Talk To Astrologer in Manglore</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-mumbai') }}"> Talk To Astrologer in Mumbai</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-muzaffarpur') }}"> Talk To Astrologer in Muzaffarpur</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-mysore') }}"> Talk To Astrologer in Mysore</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-raipur') }}"> Talk To Astrologer in Raipur</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-siliguri') }}">Talk To Astrologer in Siliguri</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-srinagar') }}">Talk To Astrologer in Srinagar</a></li>

                            <li class="list-group-item"><a class="list-color"
                                    href="{{ route('city.page', 'talk-astrologer-ujjain') }}"> Talk To Astrologer in Ujjain</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

