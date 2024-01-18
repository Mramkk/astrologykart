@extends('web.layouts.master')

@section('head')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

<title>Web Stories Of Astrology Kart</title>
<meta name="description" content="Web stories">
<meta name="keywords" content="web stories,">
<meta name="robots" content="index,follow">
<meta name="googlebot" content="index,follow">
<meta name="theme-color" content="#ff230b">
<meta name="copyright" content="astrologykart.com">
<meta property="og:site_name" content="Astrologykart">
<meta property="og:type" content="website">
<meta name="MobileOptimized" content="320">
<link rel="canonical" href="{{ url()->current() }}" />

<!--<link rel="stylesheet" href="assets/lightbox/simple-lightbox.css?v2.11.0" />-->
<style>
    .card {
        border:none!important;
    }
    .top-imgh {
        height: 480px !important;
    }
    .left-imgh {
        height: 230px !important;
    }
    .middle-img1 {
        height: 230px !important;
    }
    .middle-img3 {
        height: 250px !important;
    }
</style>
@endsection

@section('main-content')

<div class="container mt-5 mb-2">
    <div class="row">
        <div class="col-md-8">
            <div class="pb-3">
                
                <div class="card mb-3 shadow-lg">
                    <a href="{{route('maha')}}">
                        <img src="{{url('assets/img/slider/mahapurusa.jpg')}}" class="card-img-top left-imgh" alt="Web Stories" />
                    </a>
                    <a href="{{route('maha')}}">
                        <div class="card-body shadow-lg">
                            <h5 class="card-title">23 June 2023</h5>
                            <p class="card-text">
                               Mahapurusa Yoga – an important combination in Vedic astrology
                            </p>
                        </div>
                    </a>
                </div>
               
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-3 shadow-lg">
                        <a href="{{route('walking')}}">
                            <img src="{{url('assets/img/slider/barefoot.jpg')}}" class="card-img-top" alt="Web Stories" />
                        </a>
                        <a href="{{route('walking')}}">
                            <div class="card-body shadow-lg">
                                <h5 class="card-title">23 June 2023</h5>
                                <p class="card-text">
                                    Walking Barefoot In Grass - A Great Way To Please Saturn
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 shadow-lg">
                        <a href="{{route('role')}}">
                            <img src="{{url('assets/img/slider/planets.jpg')}}" class="card-img-top" alt="Web Stories" />
                        </a>
                        <a href="{{route('role')}}">
                            <div class="card-body shadow-lg">
                                <h5 class="card-title">23 June 2023</h5>
                                <p class="card-text">
                                    Role of Planets in Astrology
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 shadow-lg">
                        <a href="{{route('capricorn')}}">
                            <img src="{{url('assets/img/slider/capricorn.jpg')}}" class="card-img-top" alt="Web Stories" />
                        </a>
                        <a href="{{route('capricorn')}}">
                            <div class="card-body shadow-lg">
                                <h5 class="card-title">23 June 2023</h5>
                                <p class="card-text">
                                   Unknown facts regarding the Capricorn zodiac sign.
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 shadow-lg">
                <a href="{{route('scorpio')}}">
                    <img src="{{url('assets/img/slider/scorpion.jpg')}}" class="card-img-top top-imgh" alt="Web Stories" />
                </a>
                <a href="{{route('scorpio')}}">
                    <div class="card-body shadow-lg">
                        <h5 class="card-title">23 June 2023</h5>
                        <p class="card-text">
                           Unknown Facts about Scorpion zodiac sign you must know!
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>






<div class="container mt-2 mb-2">
    <div class="row">
        <div class="col-md-3">
            
            <div class="card mb-3 shadow-lg">
                <a href="{{route('career-growth')}}">
                    <img src="{{url('assets/img/slider/career-growth.jpg')}}" class="card-img-top middle-img1" alt="Web Stories" />
                </a>
                <a href="{{route('career-growth')}}">
                    <div class="card-body shadow-lg">
                        <h5 class="card-title">24 July 2023</h5>
                        <p class="card-text">
                           Top Vastu Tips To Grow in Career
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card mb-3 shadow-lg">
                <a href="{{route('business-growth')}}">
                    <img src="{{url('assets/img/slider/business-growth.jpg')}}" class="card-img-top" alt="Web Stories" />
                </a>
                <a href="{{route('business-growth')}}">
                    <div class="card-body shadow-lg">
                        <h5 class="card-title">24 July 2023</h5>
                        <p class="card-text">
                            Vastu Remedies For Business Growth
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <!--<div class="col-md-4">-->
        <!--    <div class="card mb-3 shadow-lg">-->
        <!--        <a href="#">-->
        <!--            <img src="{{url('assets/img/slider/astro.jpg')}}" class="card-img-top middle-img3" alt="Web Stories" />-->
        <!--        </a>-->
        <!--        <a href="#">-->
        <!--            <div class="card-body shadow-lg">-->
        <!--                <h5 class="card-title">23 June 2023</h5>-->
        <!--                <p class="card-text">-->
        <!--                    8th-->
        <!--                </p>-->
        <!--            </div>-->
        <!--        </a>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
</div>





<!--<div class="container mt-2 mb-5">-->
<!--    <div class="row">-->
<!--        <div class="col-md-8">-->
<!--            <div class="pb-3">-->
                
<!--                <div class="card mb-3 shadow-lg">-->
<!--                    <a href="#">-->
<!--                        <img src="{{url('assets/img/slider/46.jpg')}}" class="card-img-top left-imgh" alt="Web Stories" />-->
<!--                    </a>-->
<!--                    <a href="#">-->
<!--                        <div class="card-body shadow-lg">-->
<!--                            <h5 class="card-title">23 June 2023</h5>-->
<!--                            <p class="card-text">-->
<!--                                9th-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
            
<!--            </div>-->
<!--            <div class="row">-->
<!--                <div class="col-md-4">-->

<!--                    <div class="card mb-3 shadow-lg">-->
<!--                    <a href="#"><img src="{{url('assets/img/slider/46.jpg')}}" class="card-img-top" alt="Web Stories" /></a>-->
<!--                    <a href="#"><div class="card-body shadow-lg">-->
<!--                            <h5 class="card-title">23 June 2023</h5>-->
<!--                            <p class="card-text">-->
<!--                                10th-->
<!--                            </p>-->
<!--                        </div></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <div class="card mb-3 shadow-lg">-->
<!--                    <a href="#"><img src="{{url('assets/img/slider/46.jpg')}}" class="card-img-top" alt="Web Stories" /></a>-->
<!--                    <a href="#"><div class="card-body shadow-lg">-->
<!--                            <h5 class="card-title">23 June 2023</h5>-->
<!--                            <p class="card-text">-->
<!--                                11th-->
<!--                            </p>-->
<!--                        </div></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <div class="card mb-3 shadow-lg">-->
<!--                    <a href="#"><img src="{{url('assets/img/slider/46.jpg')}}" class="card-img-top" alt="Web Stories" /></a>-->
<!--                    <a href="#"><div class="card-body shadow-lg">-->
<!--                            <h5 class="card-title">23 June 2023</h5>-->
<!--                            <p class="card-text">-->
<!--                                12th-->
<!--                            </p>-->
<!--                        </div></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-md-4">-->
<!--            <div class="card mb-3 shadow-lg">-->
<!--            <a href="#"><img src="{{url('assets/img/slider/46.jpg')}}" class="card-img-top top-imgh" alt="Web Stories" /></a>-->
<!--            <a href="#"><div class="card-body shadow-lg">-->
<!--                    <h5 class="card-title">23 June 2023</h5>-->
<!--                    <p class="card-text">-->
<!--                        13th-->
<!--                    </p>-->
<!--                </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->





@endsection
