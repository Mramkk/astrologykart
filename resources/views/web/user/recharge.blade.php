@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Add Money To Wallet</title>
    <link rel="stylesheet" href="{{ asset('assets/web/css/user.css') }}">
@endsection

@section('style')
    <style>
        .rbtn {
            background-color: #7fbb85;
            border-radius: 5px;
            box-shadow: 1px 1px 2px 1px #ddd;
            margin-bottom: 22px;
            width: 100%;
            padding: 2rem;
            padding: 20px 0;
            text-align: center;
            font-family: var(--font-lato);
            cursor: pointer;
            transition: 0.5s;
            position: relative;
            overflow: hidden;
        }

        .ribbon {
            font-size: 10px;
            font-weight: 700;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            line-height: 22px;
            width: 120px;
            display: block;
            background: #a00;
            background: linear-gradient(#a00, #a00);
            box-shadow: 0 3px 10px -5px #000;
            position: absolute;
            top: 12px;
            left: -27px;
            border-radius: 2px;
            transform: rotate(-36deg);
        }

        .rbtn:hover {
            background-color: #70b177;
            box-shadow: 2px 2px 3px 2px #c2c2c2;
        }

        .rupee {
            font-family: var(--font-lato) !important;
        }
    </style>
@endsection

@section('main-content')
    <div class="main-container pt-5">
        <div class="container">
            <h3 class="text-center pb-4" style="color: #4b4b4b;"></h3>
            @include('web.includes.user.page-title',['page_title'=>'Add Money to Wallet','back_btn'=>'./'])
            <div class="row mt-3">
                @foreach ($recharge as $data)
                    <div class="col-md-4">
                        <div class="rbtn" onclick="recharge({{ $data->amount }})">
                            @if (!empty($data->extra) and $data->extra > 0)
                                <span class="ribbon">{{$data->extra}}% EXTRA</span>
                            @endif
                            <h3><span class="rupee">₹</span>{{ $data->amount }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br><br><br>
    </div>
    @include('web.includes.user.overlay-loader')
@endsection

@section('script')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function recharge(amount) {
            var x = new Ajx;
            x.actionUrl("{{ route('wallet.ajax') }}");
            x.ajxLoader('#overlay__loader');
            x.passData('action', 'CREATE_PAYMENT');
            x.passData('amount', amount);
            x.globalAlert(true);
            x.start(function(response) {
                if (response.status == true) {
                    var data = response.data;
                    var options = {
                        "key": "{{ env('RAZORPAY_KEY') }}",
                        "amount": data.amount * 100,
                        "currency": "INR",
                        "name": "Astrologykart",
                        "description": "Wallet Recharge",
                        "image": "{{ asset('assets/img/logo/logo_icon.png') }}",
                        "order_id": data.order_id,
                        "handler": function(response) {
                            var x = new Ajx;
                            x.actionUrl("{{ route('wallet.ajax') }}");
                            x.ajxLoader('#overlay__loader');
                            x.globalAlert(true);
                            x.errorMsg(false);
                            x.passData('action', 'GET_PAYMENT');
                            x.passData('payment_id', response.razorpay_payment_id);
                            x.passData('order_id', response.razorpay_order_id);
                            x.start(function(response) {
                                if (response.status == true) {
                                    location.replace("{{route('recharge_success.page')}}");
                                }
                            });
                        },
                        "prefill": {
                            "name": "{{ auth()->user()->name }}",
                            "email": "{{ auth()->user()->email }}",
                            "contact": "{{ auth()->user()->mobile }}"
                        },
                        "theme": {
                            "color": "#3CB815"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.on('payment.failed',
                        function(response) {
                            // alert(response.error.code);
                            alert(response.error.description);
                            // alert(response.error.source);
                            // alert(response.error.step);
                            alert(response.error.reason);
                            // alert(response.error.metadata.order_id);
                            // alert(response.error.metadata.payment_id);
                        });
                    rzp1.open();
                }
            });
        }
    </script>
@endsection
