@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Chat with Astrologer | Chat with Astrologer Online - Astrology Kart</title>
    <meta
        name="description"content="Chat with the best astrologer in India and get the best astrology advices and best accurate online astrology predictions only at Astrology Kart.">
    <meta
        name="keywords"content="Chat with Astrologer,Chat with Astrologer Online, astrology kart,online chat with astrologer, astrology 2022,  zodiac signs daily horoscope today, zodiac signs by month, horoscope 2022, zodiac signs, daily horoscope today, aaj ka panchang in hindi 2022 today,navratri 2022,kundli bhagya 2022,best wedding dates 2022 astrology,birth chart, best astrologer in India, vedic astrology, astrology today, aaj ka rashifal astrology, Chat with an Expert Astrologer, Live Chat With Astrologer, Chat with Astrologer 24x7, Chat with best astrologer in India">
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
            <div class="col-md-3">
            <h1 class="fs-2">Chat With Astrologer</h1>
            </div>
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
                <form class="widget__search--form" action="{{route('chat_with_astrologer.page')}}" method="GET">
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
                                <img class="astro-image" src="{{ asset('assets/img/astrologer/' . $data->image) }}"
                                    alt="{{ $data->name }}">
                                <span class="astro-rating"> ★ ★ ★ ★ ★ </span>
                            </div>
                            <div class="col-8 px-0 position-relative">
                                <img src="{{ asset('assets/img/icons/verified.png') }}" class="verifeid-icon float-end"
                                    alt="Verified">
                                <span class="astro-name">{{ $data->name }}</span>
                                <span class="astro-txt">{{ Str::words($data->skills, 3, ' ...') }}</span>
                                <span class="astro-txt">{{ Str::words($data->language, 3, ' ...') }}</span>
                                <span class="astro-txt">Exp: {{ Str::words($data->experience, 3, ' ...') }} Years</span>
                                @if ($data->call_price <= 0)
                                    <span class="astro-price price-free">Free</span>
                                @else
                                    <span class="astro-price">₹{{ $data->call_price }}/min</span>
                                @endif
                                @if (auth()->user())
                                    <a href="{{url('chat-form',[$data->id])}}" class="astro-btn online">Chat</a>
                                @else
                                    <button type="button" class="astro-btn online" data-open="user-login-modal">
                                        Chat</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="page-content">
            <h2>Chat with Best Astrologer</h2>
            <p>Astrology Kart astrology consultation services, which connect you with overtop reputed astrologers online,
                can
                be your one-stop destination to find answers to all such queries. Astrology is a science with its own sets
                of methods, claims, and findings that have forever inspired and allowed people with insights into different
                predictive aspects of their life. These factors include your romantic life, job, company, financial success,
                and so much more. All these aspects impact our lives in some way or the other, and we usually wish for them
                to be on a positive track. But surely, that’s not invariably possible. Life is full of ups and downs, and
                there may be moments when you find yourself in a mud and solely want to get out of it. Well, that is one
                time when astrology and astrologers could be your savior.</p>
            <p><b>Chat with Astrologer</b> may be your natural response if you are experiencing doubt and anxiety on all of the
                following fronts and want immediate solutions to your difficulties. Take their advice to find your true path
                in life. Don't delay in getting an astrological consultation via online chat and taking effective advice,
                considering possibilities, and making decisions about your future.</p>
            <p>In a variety of notable disciplines, Astrology Kart reflects the leading variety available to individuals all
                across the world. Professionals and experts in various astrological systems and methods share information
                about their particular fields of knowledge with visitors to our website through free online astrology chat
                sessions. As a consequence, Astrology Kart enables astrologers to share their expertise through an online
                forum.</p>
            <p>Astrology Kart provides live Astrology chat with consultants for ongoing problems that require quick
                attention
                and resolution. You may have numerous concerns about your life, and your future is dependent on the decision
                you make now. It might be about school, marriage, or anything else in life. <b>Chatting with a professional
                Vedic astrologer</b> can provide you with on-the-spot remedies to help you make the right selections.</p>
            <p>Astrology Kart seeks to deliver solutions that are authentic, reasonable, and approachable. All of your
                worries expressed in the online Jyotish conversation are kept strictly personal and private. Problems that
                you cannot solve or share with others can be discussed on the Astrology Kart chat. The astrological consultation
                is kept private, and the astrology advice given is a customized solution that is exactly tailored to your
                condition. </p>
            <p>Since the beginning, <b>Chat with Astrologer</b> has featured the most renowned astrologers with the most accurate
                solutions to all of life's problems. And if we look back in time, there are documented outcomes that
                demonstrate the potency of Astrology. Today, astrology is practiced in many regions of the world, and even
                the most renowned and powerful individuals rely on it. We have created a skeptical attitude that challenges
                everything throughout time, yet certain things have remained unchallenged. One such example is the ability
                of Astrology to improve people's lives.</p>
            <p>The issue here is that, while everyone wants to obtain the most accurate Astrology advice possible, they
                cannot find time in their busy schedules to contact an Astrologer. Will it not delight you if we tell you
                that we recognize the state that it puts you in? This is because we deliver the greatest live astrological
                consultation on chat while not having to leave the comfort of your own home?</p>
            <p>You're frequently pressured in accomplishing your potential or perhaps enjoying your thought-out plan? If
                that's the case, it's time to get rid of those barriers by engaging in an online chat with one of our
                knowledgeable and well-equipped astrologers. <b>Chat with Astrologer</b> Online right now is here to discover your
                destined lives via Kundli Predictions from the best Indian astrologers, and get answers to all of your
                questions.</p>

            <h2>Chat With Astrologer</h2>
            <p>As India is a place where we have studied different Vedas, Vedic culture and terms that binds us with its
                roots. It is place where all the Vedas are combined into four Vedas by Sage Vyasa. As his parents were
                belonging to community of Dravidian and Aryan. So, Aryan always used to follow the stars and by that they
                introduced the term of astrology and the Dravidian always used to focus upon face and doing the predictions.
                As there is zero possibility that astrology is real, although there is a huge industry in the field of
                astrology, so they try to guide you with the best knowledge. Astrology Kart is a one-step platform where you
                are getting the best Astrologers at a single platform. Here you are getting the service of chat with
                Astrologer where you will be chatting with some popular astrologers in a minute of time.</p>
            <h2>What services that Astrology Kart is generating for you?</h2>
            <ul>
                <li>Certified Astrologers in a Board</li>
                <p>In Astrology Kart you are getting the top most Astrologers online who are expert in their Astrology,
                    Vedic Astrology, Numerology or Gemstone specialists at a common platform which is very rare to find. As
                    they will not only preview your approaching event which can be good or bad and will guide you with best
                    remedies related to the uncertain events. They will calculate the cosmic energy near you and will
                    suggest you with the best things that are needed to be shared with you in the chat basis.</p>
                <li>Predictions that are not generalized</li>
                <p>As we very well know it is a human tendency to check the horoscope section and at last we always get
                    disheartened as it affects us a lot because we just start to join the dots with the current scenario for
                    which we always get disappointed. So, we must know that those predictions are on the generalized basis.
                    Here you will not get the personalized horoscope reading but in Astrology Kart you can get your proper
                    customized according to your current scenario. Here you can chat with the astrologer and will get a
                    proper PDF and they will make you understand what is happening in your life.</p>
                <li>Best for Introverts</li>
                <p>As nowadays every platform is coming up with new services that can help different kinds of people like
                    Introverts, Ambiverts or Extroverts. As it is easy to have a call and talk with unknown being an
                    extrovert but what about Introverts. They find a bit difficulty while interacting to someone they don’t
                    know in real. So, Astrology Kart is here to provide the service where you can have a chat with your
                    chosen Astrologer and here no issues of having any face to face conversations as they can easily chat
                    with the unknown without showing their face. The best part is that no delay in replying the chat as
                    someone is always there to answer your question.</p>
                <li>Local Astrologer Reading</li>
                <p>As sometimes you get to know the personality by just <b>chat with astrologer</b> and develop a sense of
                    originality and confidence in their reading, so we have introduced a service called State Wise
                    Astrologer. Here you get your local astrologer reading and if you want to meet that person in real you
                    can actually visit their office. So, by this you can actually have one on one conversation in reality
                    basis as there you will; find the sense of affinity as he/ she belongs to your city or state.</p>
                <li>Online chat for 24x7</li>
                <p>Astrology Kart is providing you the service to have a chat with any of our Astrologer at any time as per
                    your comfort. This service is introduced to help you with managing your time as you are busy in day, so
                    you want to sit down and just have a conversation in chat form with your chosen Astrologer at the
                    midnight.Pocket Friendly service Astrology Kart presents this service very proudly as we ensure that
                    customer is our God, and we want to our God to be happy in every aspect, so we have fixed the rates a
                    reasonable price. This price is managed according to the per minute charges so always check the price
                    according to its per minute charges and choose your favorite astrologer and cat with them personally.
                </p>
            </ul>
            <h2>How can we Chat?</h2>
            <p>Get better advice about your future marriage, sexual life, job, or fitness by chatting. Your customized
                delivery map contains mysterious treasures that will bring you a prosperous career as well as a happy
                marriage. The impact of planets and their positions on your personal and professional relationships is
                significant, in their opinion, once a person realizes that their full potential has been unlocked. For
                Consultation, we have compiled a list of famous astrologers from around India who are undeniably the best
                astrologers in India. Astrology has a broad definition that incorporates information about planets and
                stars. Although this term may also relate to mathematics (theory), most people use it to refer to
                astrological study.</p>
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
                                                        <input class="account__login--input"
                                                            placeholder="Enter Email Address" type="email" name="email"
                                                            required>
                                                    </label>
                                                    <label>
                                                        <textarea name="message" class="account__login--input" cols="30" rows="10" name="message"
                                                            placeholder="Message"></textarea>

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
