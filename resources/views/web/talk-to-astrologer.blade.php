@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <title>Talk To Astrologer | Talk to Astrologer Online 24x7 - Astrology Kart </title>
    <meta
        name="description"content="Consult with the best astrologers - Get the opportunity to Talk to best astrologers from the best astrologers in India. Get astrology advice on your First Call.">
    <meta
        name="keywords"content="Talk to Astrologer, Talk to Astrologer Online, Astrology 2022, Astrology today, Astrology in Hindi, astrology malayalam 2022, Astrologer,  Horoscope, Horoscope today, Horoscope daily, Horoscope 2022, Kundli Bhagya, kundali bhagya 2022,zodiac signs,  janm kundli, aaj ka rashifal astrology, indian matchmaking, matchmaking for marriage, vedic astrology,  vastu & astrology, ank jyotish 2022, Talk to best astrologer in India">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="theme-color" content="#ff230b">
    <meta name="copyright" content="astrologykart.com">
    <meta property="og:site_name" content="Astrologykart">
    <meta property="og:type" content="website">
    <meta name="MobileOptimized" content="320">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('main-content')
    <div class="container pt-2">
        <div class="row align-items-center mb-2">
            <div class="col-md-3"><h1 class="fs-2">Talk to Astrologer</h1></div>
            @if (auth()->user())
                <div class="col-md-3">
                    <span style="font-size: 18px">Available balance: ₹ <span>{{ $user->balance }}</span> </span>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('recharge.page') }}"><button class="astro-btn recharge mt-3">Recharge</button></a>
                </div>
            @else
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
                
            @endif
            
            <div class="col-md-3">
                    <form class="widget__search--form" action="{{route('talk_to_astrologer.page')}}" method="GET">
                        <label>
                            <input class="widget__search--form__input" name="search" value="{{ $_GET['search'] ?? null }}"
                                placeholder="Search..." type="text">
                        </label>
                        <button type="submit" class="widget__search--form__btn" aria-label="search button">
                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51"
                                height="20.443" viewBox="0 0 512 512">
                                <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none"
                                    stroke="currentColor" stroke-miterlimit="10" stroke-width="32">
                                </path>
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="32" d="M338.29 338.29L448 448"></path>
                            </svg>
                        </button>
                    </form>
                </div>
        </div>
        <div class="row">
            @foreach ($astrologers as $data)
                @if (file_exists('assets/img/astrologer/' . $data->image) and !empty($data->image))
                    <div class="col-md-4">
                        <div class="astro-container row">
                            <div class="col-4 py-3 text-center">
                                <a href="{{ route('astrologer_profile.page', $data->slug ?? '---') }}">
                                    <img class="astro-image" src="{{ asset('assets/img/astrologer/' . $data->image) }}"
                                        alt="{{ $data->name }}">
                                </a>
                                <span class="astro-rating"> ★ ★ ★ ★ ★ </span>
                            </div>
                            <div class="col-8 px-0 position-relative">
                                <img src="{{ asset('assets/img/icons/verified.png') }}" class="verifeid-icon float-end"
                                    alt="Verified">
                                <a href="{{ route('astrologer_profile.page', $data->slug ?? '---') }}">
                                    <span class="astro-name">{{ $data->name }}</span>
                                </a>
                                <span class="astro-txt">{{ Str::words($data->skills, 3, ' ...') }}</span>
                                <span class="astro-txt">{{ Str::words($data->language, 3, ' ...') }}</span>
                                <span class="astro-txt">Exp: {{ Str::words($data->experience, 3, ' ...') }} Years</span>
                                @if ($data->call_price <= 0)
                                    <span class="astro-price price-free">Free</span>
                                @else
                                    <span class="astro-price">₹{{ $data->call_price }}/min</span>
                                @endif
                                @if (auth()->user())
                                    <a href="{{url('call-form',[$data->id])}}" class="astro-btn online">Call</a>
                                @else
                                    <button type="button" class="astro-btn online" data-open="user-login-modal">
                                        Call</button>
                                @endif

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>




        <div class="page-content">
            <h2>Talk to Best Astrologer</h2>
            <p>At Astrology Kart, our mission is to unite the world's foremost online astrologers.
            Our highly knowledgeable Vedic astrologers are now accessible worldwide. Explore our 
            website to connect with the best astrologers, numerologists, tarot readers, and more – all from the comfort of your home. 
            Astrology Kart brings the world's top astrologers closer to you, offering a ray of hope like never before.</p>
            <p>Our team is committed to inviting the world's top astrologers to join Astrology Kart and be part of this 
            technological revolution of live astrological consultations across the globe, in an exceptionally user-friendly manner. 
            A simple procedure is used to communicate with astrologers. Enter your information and schedule a consultation with an astrologer. 
            It's as simple as that; no need to go long distances or wait for appointments; simply choose the finest astrologer 
            from our platform and get your questions answered.</p>
            <p>In life, we encounter various challenges and fluctuations, making astrology a valuable study for effective remedies. 
            If planetary alignments are causing disruption or persistent delays in significant events are causing concern, Jyotish 
            Shastra offers insightful solutions. When seeking guidance from a reliable Jyotish or astrologer is essential, turn to 
            Astrology Kart to find trustworthy answers to your challenges. Consult with our astrologers for a reliable solution.</p>
            <p>Having a live astrological consultation with an internet astrologer by phone or chat was never as easy, but
                our efforts have led to it a reality. Astrology Kart is one of the most popular online astrology websites
                for
                people concerned about their future. You can <a href="https://astrologykart.com/"><b>Talk to Best Astrologer in India</b></a> with top Vedic astrologers, Tarot
                readers, Numerologists, and Vastu experts who can help map your future. Have you ever considered what makes
                your decision right? Is it the timing and circumstances that bring out the best in you? Top astrologers
                provide you with all-satisfying solutions to make situations work on your behalf instead of the other way
                around.</p>
            <p>You may <b>Talk to Astrologer</b> through call at any time whether it is day or night on our website Astrology Kart.
                If you experience, you will leave no stone unturned in shaping your future, and the outcome will be
                unfavourable. It is difficult to remember a moment when you were concerned with stability and nourishment
                rather than failure and insecurity. India is our country with the oldest and wealthiest civilization, and
                astrology is both an art and a science that is at the heart of our ancient standards.</p>

            <h2>Talk to Astrologer</h2>
            <p>Wondering about the future? Concerned about your own or your loved ones' well-being? Look no further; 
               all your answers await you at Astrology Kart. We're dedicated to offering a platform where you can access the 
               world's best astrologers, highly qualified, skilled, and knowledgeable. But that's not all; we also bring you Vedic 
               astrology readers, numerologists, and tarot card readers for your convenience. There's no limit here; you can have as 
                many consultations as you'd like. We're your pocket-friendly, cost-effective solution for all your needs, making it easy and accessible.</p>
            <h3>Why should you talk to our astrologers?</h3>
            <ul>
                <li>Personalized explanation at just one click</li>
                <p>Here you will get your customized data related to your work, health, Vastu tips etc., at just one click only 
                   you have to initiate the process as per your choice. We don’t want that our customers have to face any kind of 
                   problem related lagging or busy so here we provide you with different options so if you don’t like the prediction 
                   you can switch onto some other astrologer as we have a panel where there are astrology readers from different zone.</p>
                <li>Entitle you to flourish in every Aspect</li>
                <p>We offer top-notch astrology guidance and practical solutions. 
                   Our seasoned astrologers are committed to empowering you on all levels – physically, 
                   emotionally, and mentally. They provide insights on what steps to take in the future and how to navigate them effectively.</p>
                <li>24x7 online service</li>
                <p>At Astrology Kart, we offer 24/7 service that lets you connect with your astrologer from the comfort of your home. 
                   No need to travel or go outside – just call and talk with your favorite astrologer whenever it suits you. 
                   Whether it's 2 am or 2 pm, you're just a call away from getting personalized Kundali predictions and future guidance in astrology.</p>
                <li>Expertise advice in a minute</li>
                <p>Panel of Astrologers who are licensed and certified in the field of Astrology are here to help and guide you with 
                   different aspects of Astrology like Vedic Astrology, Numerologists, Tarot Reader, Lal Kitab etc. Here you can see the experience, 
                   the costing of each astrologer for per minute charges. We offer language options to suit your comfort, including Bengali, Hindi, Tamil, and English.</p>
                <li>State Wise Astrologer</li>
                <p>An important feature of Astrology Kart is the ability to choose an astrologer from your own state. 
                   For those seeking in-person consultations, we offer a local astrologer reading service tailored to your state or locality. 
                   Please note that this service is exclusively available for Indian citizens.</p>
            </ul>
            <h3>Astrology Kart Serves the Best Astrologers in India</h3>
            <p>Astrology Kart, a leading astrology website, offers high-quality services from top astrologers all in one place. 
               You can receive expert astrological guidance from renowned Pandits and astrologers in India, well-versed in ancient 
               Vedic astrology. Our platform features the best astrologers, including Numerologists, Tarot readers, Psychics, and 
               Vaastu professionals, with extensive knowledge and years of experience. Their accurate predictions have been a guiding 
               light through countless challenges. Their profound insights help individuals navigate financial, future, marriage, health,
               and career matters with foresight.</p>
            <p><b>Consult an astrologer online for insights into Numerology, Psychic Readings, Lal Kitab, and Prophecies, 
            which have deep roots in our rich Indian culture and heritage. Our ancestors were well-acquainted with practices like magic and 
            black magic, and they possessed a profound understanding of celestial bodies such as planets and stars thousands of years ago. 
            In ancient times, our ability to predict the future set us apart, and our astrologers now provide online guidance to those facing 
            life's challenges and hardships.
            </p>
            <p>We are also avoiding the extinction of this wonderful Indian knowledge by employing the power of astrology.
                Now, you may access the whole astrological services with a single mouse click or by scrolling your finger on
                your mobile. You may receive the best online astrology consultation from India's greatest astrologer and
                influence your destiny or yourself. Looking for a reliable astrological guide? On our Astrology Kart, please
                do not hesitate to contact or <a href="https://astrologykart.com/"><b>Talk to best astrologers in India</b></a>, Tarot Readers, Numerologist, Psychic Readers, and
                Vastu experts.</p>
        </div>

        {{-- model  --}}
        <div class="modal" id="user-query-modal" data-animation="slideInUp">
            <div class="modal-dialog quickview__main--wrapper">
                <header class="modal-header quickview__header">
                    <button class="close-modal quickview__close--btn" aria-label="close modal" data-close="">✕ </button>
                </header>
                <div class="modal-body">
                    <!-- Start login section  -->
                    <div class="login__section position-relative">
                        <div class="container">
                            <form action="{{ url('get-in-touch') }}" method="post">
                                @csrf
                                <div class="login__section--inner">
                                    <div class="">
                                        <div class="col">
                                            <div class="account__login" style="max-width:400px; margin:auto;">
                                                <div class="account__login--header mb-25">
                                                    <h2 class="account__login--header__title h3 mb-10">Get In Touch</h2>
                                                </div>
                                                <div class="account__login--inner">
                                                    <label>
                                                        <input class="account__login--input" placeholder="Enter Full Name"
                                                            type="text" name="fullName" required>
                                                    </label>
                                                    <label>
                                                        <input class="account__login--input" placeholder="Enter Mobile No."
                                                            type="text" name="mobile" required>
                                                    </label>
                                                    <label>
                                                        <input class="account__login--input" placeholder="Enter Email Address"
                                                            type="email" name="email" required>
                                                    </label>
                                                    <label>
                                                        <textarea name="message" class="account__login--input" cols="30" rows="10" name="message" placeholder="Message"></textarea>

                                                    </label>


                                                    <input type="submit" value="Submit" class="btn">

                                                    {{-- <button class="btn" type="submit" name="submit">
                                                        Submit
                                                        {!! Hpx::spinner() !!}
                                                    </button> --}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <!-- End login section  -->
                </div>
            </div>
        </div>

    </div>
@endsection


@section('script')
    <script>
        // $(document).on('click', '.astro-btn', function() {
        //     location.href = "{{ route('account.page') }}";
        // });
    </script>
@endsection
