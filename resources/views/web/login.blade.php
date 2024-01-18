@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Login</title>
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
        .height-100 {
            height: 100vh
        }

        .login-card {
            width: 350px;
            border: none;
            height: 250px;
            box-shadow: 0px 5px 20px 0px #d2dae3;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .login-card h6 {
            color: var(--secondary-color);
            ;
            font-size: 20px
        }

        .inputs input {
            width:100%;
            height: 40px;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0
        }

        .login-card-2 {
            background-color: #fff;
            padding: 10px;
            width: 310px;
            height: 100px;
            bottom: -50px;
            left: 20px;
            position: absolute;
            border-radius: 5    px
        }

        .login-card-2 .content {
            margin-top: 50px
        }

        .login-card-2 .content a {
            color: var(--secondary-color);
        }

        .form-control:focus {
            box-shadow: none;
            border: 2px solid var(--secondary-color);
        }

        .login-validate {
            border-radius: 20px;
            height: 40px;
            background-color: var(--theme-color);
            border: 1px solid var(--theme-color);
            ;
            width: 140px;
            line-height: 0;
        }

        .otp_container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 101;
            overflow-y: auto;
            background-color: #00000099;
            padding: 0 !important;
            margin: 0 !important;
        }

        .close_otp_box {
            position: absolute;
            top: 12px;
            right: 12px;
            background: none;
            border: none;
            font-weight: 400;
            font-size: 16px;
            cursor: pointer;
        }

        .close_otp_box:hover {
            color: var(--secondary-color) !important;
        }
        .login-hidebox{
            display: none !important;
            height: 0 !important;
            width: 0 !important;
            position: absolute !important;
        }
    </style>
@endsection

@section('main-content')

    <!-- Start login section  -->
    <div class="login__section section--padding mb-80 bg-light border-bottom position-relative">
        <div class="container">
            <form action="#" id="login_form">
                <div class="login__section--inner">
                    <div class="">
                        <div class="col">
                            <div class="account__login" style="max-width:400px; margin:auto; padding:3rem;">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                    <p class="account__login--header__desc">You will receive a 6 digit OTP
                                        for verification</p>
                                </div>
                                <div class="account__login--inner">
                                    <label>
                                        <input class="account__login--input" placeholder="Enter Mobile No." type="text"
                                            name="mobile">
                                    </label>
                                    <div
                                        class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check1" type="checkbox"
                                                name="remember" checked>
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                Remember me</label>
                                        </div>
                                        <A href="" class="account__login--forgot" type="submit">Forgot Your
                                            Password?</a>
                                    </div>
                                    <button class="account__login--btn btn" type="submit" id="login_btn">
                                        Login
                                        {!! Hpx::spinner() !!}
                                    </button>
                                    {{-- <div class="account__login--divide">
                                <span class="account__login--divide__text">Or Login Using</span>
                            </div> --}}
                                    {{-- <div class="account__social d-flex justify-content-center mb-15">
                                <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com">Facebook</a>
                                <a class="account__social--link google" target="_blank" href="https://www.google.com">Google</a>
                            </div> --}}
                                    {{-- <p class="account__login--signup__text">Don,t Have an Account? <a href="{{route('register')}}"><button type="button">Register Now</button></a></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- Verify OTP --}}
        <div class="d-flex justify-content-center align-items-center otp_container login-hidebox">
            <div class="position-relative">
                <div class="login-card p-2 text-center">
                    <button type="button" class="close_otp_box">✖</button>
                    <h6>Verify OTP</h6>
                    <div> <span>A code has been sent to your mobile.</span></div>
                    <form id="otp_form">
                        <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                            <input class="m-2 text-center form-control rounded fs-4" type="number" placeholder="Enter OTP here" id="first" maxlength="6" />
                        </div>
                        <div class="mt-4"> <button type="submit" class="btn btn-danger px-4 login-validate">SUBMIT {!! Hpx::spinner() !!}</button> </div>
                    </form>
                </div>
                <div class="login-card-2">
                    <div class="content d-flex justify-content-center align-items-center"> <span>Didn't get the code</span>
                        <a href="{{route('user.login')}}" class="text-decoration-none ms-3">Resend</a> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End login section  -->
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('#login_form').submit(function(e) {
                e.preventDefault();
                var x = new Ajx;
                x.form = '#login_form';
                x.actionUrl("{{ route('user.login') }}");
                x.passData('action','SEND_OTP');
                x.ajxLoader('#login_form .loaderx');
                x.globalAlert(true);
                x.disableBtn('.account__login--btn');
                x.start(function(response) {
                    if (response.status == true) {
                        $('.otp_container').removeClass('login-hidebox');
                        $('#otp #first').focus();
                    }
                });
            });

            $('#otp_form').submit(function(e) {
                e.preventDefault();
                var x = new Ajx;
                var mobile = $('[name="mobile"]').val();
                var otp = $('#first').val();
                x.actionUrl("{{ route('user.login') }}");
                x.passData('action','VERIFY_OTP');
                x.passData('mobile',mobile);
                x.passData('otp',otp);
                x.ajxLoader('.login-validate .loaderx');
                x.disableBtn('.login-validate');
                x.globalAlert(true);
                x.start(function(response) {
                    if (response.status == true) {
                        // location.replace("{{ route('home.page') }}");
                        location.reload();
                    }
                });
            });
        });

        $(document).on('click','.close_otp_box',function(){
            $('.otp_container').addClass('login-hidebox');
            $('#otp input').val('');
        });
    </script>
@endsection
