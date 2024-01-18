@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Recharge Successfull</title>
    <link rel="stylesheet" href="{{ asset('assets/web/css/user.css') }}">
@endsection

@section('style')
    <style>
        .xh1 {
            font-family: 'Kaushan Script' !important;
            font-size: 3em;
            letter-spacing: 3px;
            color: var(--theme-color);
            margin: 0;
            margin-bottom: 20px;
        }

        .go-home {
            color: #fff;
            background: var(--theme-color);
            border: none;
            padding: 10px 50px;
            margin: 30px 0;
            border-radius: 30px;
            text-transform: capitalize;
        }
    </style>
@endsection

@section('main-content')
    <div class="main-container pt-5">
        <div class="container text-center">
            <h1 class="xh1">Recharge Successfull !</h1>
            <p class="pt-3">Your recharge is done successfully. </p>
            <a href="{{ route('account.page') }}" class="go-home">
                Go Back
            </a>
        </div>
    </div>
    @include('web.includes.user.overlay-loader')
@endsection
