@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>My Account</title>
    <link rel="stylesheet" href="{{ asset('assets/web/css/user.css') }}">
@endsection

@section('main-content')
    <div class="main-container pt-5">
        <div class="container">
            @include('web.includes.user.page-title',['page_title'=>'My Account'])
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <button type="button" class="box-btn-right" data-open="edit-profile-modal"><i
                                class="icofont-edit"></i> Edit</button>
                        <h1 class="box-title">My Profile</h1>
                        <div class="box-data pt-2">
                            <form action="{{ route('user.ajax') }}" enctype="multipart/form-data"
                                id="pro-img-form">
                                <input type="hidden" value="UPDATE_PRO_IMG" name="action">
                                <div class="text-center">
                                    <img class="user-image"
                                        src="@if(!empty($user->image) and file_exists('assets/img/userprofile/'.$user->image)) {{ asset('assets/img/userprofile/'.$user->image) }} @else {{asset('assets/img/userprofile/user.png')}} @endif"><br>
                                    <button type="button" id="pro-img-btn" class="btnx recharge-btn mt-3 fs-4"
                                        style="background-color:#0a755a;" onclick="select_image()">
                                        <i class="icofont-image"></i>
                                        Change
                                        {!! Hpx::spinner() !!}
                                    </button>
                                    <input type="file" accept="image/*" name="image" id="pro-img-input"
                                        class="invisible" style="position: absolute; height:0; width:0; opacity:0;" />
                                    <h4 id="user__name">{{ $user->name ?? 'User' }}</h4>
                                    <span>{{$user->mobile ?? null}}</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <h1 class="box-title">Wallet</h1>
                        <div class="box-data pt-2">
                            <div class="text-center py-2">
                                <h4>Available Balance : <span style="display:initial; color: #1b1b1b">₹{{$user->balance}}</span></h4>
                                <a href="{{route('recharge.page')}}"><button class="btnx w-200 recharge-btn mt-3">Recharge</button></a>
                                <button class="btnx w-200 history-btn mt-3">Wallet History</button>
                                <a href="{{route('payment_history.page')}}"><button class="btnx w-200 mt-3">Payment History</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <h1 class="box-title">Notifications</h1>
                        <div class="box-data pt-2">
                            <div class="text-center py-2">
                                <button class="btnx w-200 notification-btn mt-3">View All</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
    @include('web.includes.user.edit-profile-modal')
@endsection


@section('script')
    <script>
        function select_image() {
            $('#pro-img-input').click();
        }
        $(document).ready(function() {
            $('#pro-img-input').change(function() {
                var x = new Ajx;
                x.form = '#pro-img-form';
                x.ajxLoader('#pro-img-btn .loaderx');
                x.disableBtn('#pro-img-btn');
                x.globalAlert(true);
                x.reset = true;
                x.start(function(response) {
                    if (response.status == true) {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
