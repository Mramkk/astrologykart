<style>
    .height-100 {
        height: 100vh
    }

    .login-card {
        width: 350px;
        border: none;
        height: 250px;
        /* box-shadow: 0px 5px 20px 0px #d2dae3; */
        z-index: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center
    }

    .login-card h6 {
        color: var(--secondary-color);
        ;
        font-size: 20px
    }

    .inputs input {
        width: 100%;
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
        margin-top: -30px;
    }

    .login-card-2 .content {
        margin-top: 10px
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
        background-color: #ffffff;
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

    .login-hidebox {
        display: none !important;
        height: 0 !important;
        width: 0 !important;
        position: absolute !important;
    }
    .account__login{
        box-shadow: unset;
        padding: 0;
    }
</style>
<div class="modal" id="user-login-modal" data-animation="slideInUp">
    <div class="modal-dialog quickview__main--wrapper">
        <header class="modal-header quickview__header">
            <button class="close-modal quickview__close--btn" aria-label="close modal" data-close="">✕ </button>
        </header>
        <div class="modal-body">
            <!-- Start login section  -->
            <div class="login__section position-relative">
                <div class="container">
                    <form action="#" id="login_form">
                        <div class="login__section--inner">
                            <div class="">
                                <div class="col">
                                    <div class="account__login" style="max-width:400px; margin:auto;">
                                        <div class="account__login--header mb-25">
                                            <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                            <p class="account__login--header__desc">You will receive a 4 digit OTP
                                                for verification</p>
                                        </div>
                                        <div class="account__login--inner">
                                            <label>
                                                <input class="account__login--input" placeholder="Enter Mobile No."
                                                    type="text" name="mobile">
                                            </label>
                                            <div
                                                class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                                <div class="account__login--remember position__relative">
                                                    <input class="checkout__checkbox--input" id="check1"
                                                        type="checkbox" name="remember" checked>
                                                    <span class="checkout__checkbox--checkmark"></span>
                                                    <label class="checkout__checkbox--label login__remember--label"
                                                        for="check1">
                                                        Remember me</label>
                                                </div>

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
                <!--<div class="d-flex justify-content-center align-items-center otp_container login-hidebox">-->
                <!--    <div class="">-->
                <!--        <div class="login-card text-center">-->
                <!--            <button type="button" class="close_otp_box">✖</button>-->
                <!--            <h6>Verify OTP</h6>-->
                <!--            <div> <span>A code has been sent to your mobile.</span></div>-->
                <!--            <form id="otp_form">-->
                <!--                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">-->
                <!--                    <input class="m-2 text-center form-control rounded fs-4" type="number"-->
                <!--                        placeholder="Enter OTP here" id="first" maxlength="4" />-->
                <!--                </div>-->
                <!--                <div class="mt-4"> <button type="submit"-->
                <!--                        class="btn btn-danger px-4 login-validate">SUBMIT-->
                <!--                        {!! Hpx::spinner() !!}</button> </div>-->
                <!--            </form>-->
                <!--        </div>-->
                <!--        <div class="login-card-2">-->
                <!--            <div class="content d-flex justify-content-center align-items-center"> <span>Didn't get the-->
                <!--                    code</span>-->
                <!--                <a href="{{ route('user.login') }}" class="text-decoration-none ms-1">Resend</a>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                
                <div class="d-flex justify-content-center align-items-center otp_container hidebox login-hidebox">
                    <div class="position-relative">
                        <div class="card p-2 text-center">
                            <button type="button" class="close_otp_box">✖</button>
                            <h6>Verify OTP</h6>
                            <div> <span>A 4 digit code has been sent to your mobile.</span></div>
                            <form id="otp_form">
                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                    <input type="hidden" name="otp" value="">
                                    <input class="m-2 text-center form-control rounded fs-4" type="text"
                                        id="first" maxlength="1" autocomplete="off">
                                    <input class="m-2 text-center form-control rounded fs-4" type="text"
                                        id="second" maxlength="1" autocomplete="off">
                                    <input class="m-2 text-center form-control rounded fs-4" type="text"
                                        id="third" maxlength="1" autocomplete="off">
                                    <input class="m-2 text-center form-control rounded fs-4" type="text"
                                        id="fourth" maxlength="1" autocomplete="off">

                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-danger px-4 validate">
                                        SUBMIT
                                        <span class="spinner-border spinner-s1 loaderx" style="display:none;"
                                            role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-2">
                            <div class="content d-flex justify-content-center align-items-center"> <span>Didn't get the
                                    code </span> &nbsp;
                                <a href="{{ route('user.login') }}" class="text-decoration-none ml-1 text-danger">
                                    Resend</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End login section  -->
        </div>
    </div>
</div>


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
            var addotp = $('#first').val() + $('#second').val() + $('#third').val() + $('#fourth')
                .val();
            var mobile = $('[name="mobile"]').val();
            // var otp = $('#first').val();
            x.actionUrl("{{ route('user.login') }}");
            x.passData('action','VERIFY_OTP');
            x.passData('mobile',mobile);
            x.passData('otp',addotp);
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
    
    document.addEventListener("DOMContentLoaded", function(event) {
        function OTPInput() {
            const inputs = document.querySelectorAll('#otp > *[id]');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('keyup', function(event) {
                    if (event.key === "Backspace") {
                        inputs[i].value = '';
                        if (i !== 0) inputs[i - 1].focus();
                    } else {

                        if (i === inputs.length - 1 && inputs[i].value !== '') {
                            return true;
                        } else if (event.keyCode > 47 && event.keyCode < 58) {
                            inputs[i].value = event.key;
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        } else if (event.keyCode > 64 && event.keyCode < 91) {
                            inputs[i].value = String.fromCharCode(event.keyCode);
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        } else if (event.keyCode > 95 && event.keyCode < 106) {
                            inputs[i].value = event.key;
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        } else if (event.keyCode > 95 && event.keyCode < 106) {
                            inputs[i].value = event.key;
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        } else if (event.keyCode == 229) {
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        }

                    }
                });
            }
        }
        OTPInput();
    });
    

    $(document).on('click','.close_otp_box',function(){
        $('.otp_container').addClass('login-hidebox');
        $('#otp input').val('');
    });
</script>
