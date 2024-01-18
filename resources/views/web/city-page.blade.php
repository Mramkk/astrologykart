@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>{{ $data->title }} - {{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ $data->meta_description }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $data->title }}" />
    <meta property="og:description" content="{{ $data->description }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="article:publisher" content="https://www.facebook.com/astrologykart" />
    <meta property="article:published_time" content="{{ $data->created_at }}" />
    <meta property="article:modified_time" content="{{ $data->updated_at }}" />
    <meta property="og:image:width" content="650" />
    <meta property="og:image:height" content="350" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@astrologykart" />
    <meta name="twitter:site" content="@astrologykart" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="Astrologykart" />
    <meta name="twitter:label2" content="Est. reading time" />
    <meta name="twitter:data2" content="{{ rand(4, 10) }} minutes" />
@endsection

@section('style')
    <style>
        .page-content h1 {
            font-size: 3rem;
            margin-bottom: 5px;
        }

        .page-content h2 {
            margin-bottom: 5px;
            font-size: 2.8rem;
        }

        .page-content h3 {
            margin-bottom: 5px;
            font-size: 2.6rem;
        }

        .page-content h4 {
            margin-bottom: 5px;
            font-size: 2.4rem;
        }

        .page-content h5 {
            margin-bottom: 5px;
            font-size: 2.2rem;
        }

        .page-content h6 {
            margin-bottom: 5px;
            font-size: 2rem;
        }
    </style>
@endsection

@section('main-content')
    @include('web.includes.breadcrumb_2', [
        'text1' => 'City Wise Astrologers',
        'link1' => route('city_wise_astrologers.page'),
        'text2' => $data->title
    ])
    <section class="">
        <div class="container">
            <div class="page-content pt-5">
                {!! $data->content !!}
            </div>
        </div>
    </section>
@endsection


@section('footer')
@endsection
