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
            <div class="col-md-12">
                <h1 class="fs-2">CALL INTAKE FORM</h1>
            </div>
            <div class="col-md-12">
                <form action="">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="namefield" class="form-label-call">Name: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="namefield" class="form-control name-field" value="{{$user->name}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label-call">Gender: <span class="text-danger">*</span></label>
                                    <select class="form-select">
                                        <option selected>Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label-call">Date of Birth: <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control name-field">
                                </div>

                                <div class="col-md-4 mt-4">
                                    <label class="form-label-call">Time of Birth: <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control name-field">
                                </div>

                                <div class="col-md-4 mt-4">
                                    <label class="form-label-call">Birth Place:</label>
                                    <input type="text" class="form-control name-field">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-success start-call">Start Call</button>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            </form>
        </div>

    </div>
    </div>
@endsection
