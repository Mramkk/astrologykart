@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <title>{{ $data->name }} - {{ $data->skills }}</title>
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
@endsection

@section('style')
    <style>
        .astro-profile-image {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .astro-profile-image img {
            max-height: 200px;
            max-width: 200px;
            border-radius: 50%;
            border: 1px solid #eee;
        }

        .astro-details h1 {
            font-size: 2.2rem;
            margin-bottom: 0;
            padding-bottom: 0;
            line-height: 3rem;
            color: #252525;
        }

        .astro-details span {
            display: block;
            padding: 2px 0;
            font-size: 1.6rem;
            color: #303030;
        }
        .astro-btn{
            float:none;
            display: initial;
            margin: 10px 0;
        }

        .astro-profile{
            border-radius: 8px;
            background-color:;
        }

        @media only screen and (max-width:600px){
            .astro-profile{
                border:0 !important;
            }
        }

    </style>
@endsection

@section('main-content')
@include('web.includes.breadcrumb_2',['text1'=>$data->name."'s Profile"])
<div class="container astro-profile my-4 border ">
        <div class="row py-3 py-md-5">
            <div class="col-md-3">
                <div class="astro-profile-image">
                    <img src="{{ asset('assets/img/astrologer/' . $data->image) }}" alt="{{ $data->name }}">
                </div>
            </div>
            <div class="col-md-9">
                <div class="astro-details text-center text-md-start mt-4 mt-md-0">
                    <h1>{{ $data->name }}</h1>
                    <span>{{ Str::words($data->skills, 10, ' ...') }}</span>
                    <span>{{ Str::words($data->language, 5, ' ...') }}</span>
                    <span>Exp : {{ Str::words($data->experience, 5, ' ...') }} Years</span>
                    <table class="table border text-center mt-4" style="max-width: 500px;">
                        <tr>
                            <th>Call</td>
                            <th>Chat</td>
                        </tr>
                        <tr>
                            <td>
                                @if ($data->call_price <= 0)
                                    <span class="astro-price text-success">Free</span>
                                @else
                                    <span class="astro-price">₹{{ $data->call_price }}/min</span>
                                @endif
                            </td>
                            <td>
                                @if ($data->chat_price <= 0)
                                    <span class="astro-price text-success">Free</span>
                                @else
                                    <span class="astro-price">₹{{ $data->call_price }}/min</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><button class="astro-btn online"> Call </button></td>
                            <td><button class="astro-btn online"> Chat </button></td>
                        </tr>
                    </table>
                    <h4 class="mt-3 fw-bold">About</h4>
                    <span class="text-justify">{{ $data->about }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
@endsection
