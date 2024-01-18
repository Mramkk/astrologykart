@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <title>Join As Astrologer | Online Astrologer Registration | Register as Astrologers</title>
    <meta name="description"content="Astrology kart is a prominent online astrology platform. Register as an online astrologer on our website today !">
    <meta name="keywords"content="Join As Astrologer, Online Astrologer Registration, Astrologer Registration, Register as Astrologers, Astrologer Sign Up, Jyotish Registration, Free Astrology Registration, Become an Astrologer India">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="theme-color" content="#ff230b">
    <meta name="copyright" content="astrologykart.com">
    <meta property="og:site_name" content="Astrologykart">
    <meta property="og:type" content="website">
    <meta name="MobileOptimized" content="320">
    <link rel="canonical" href="{{url()->current()}}" />
@endsection


@section('style')
    <style>
        .form-label {
            margin-bottom: 0;
            margin-top: 11px;
            margin-left: 2px;
            color: #535353;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            /* border-color: #868686; */
            border-radius: 8px;
            padding: 7px 12px;
            font-size: 15px;
        }

        .astro-register {
            box-shadow: 0 7px 20px rgb(0 0 0 / 16%);
            padding: 15px 25px;
            border-radius: 10px;
        }
        .show-banner{
            border-radius: 8px;
            cursor: pointer;
            max-width: 400px;
        }

        .show-banner:hover{
            border-color: var(--theme-color) !important;
        }
    </style>
@endsection
@section('main-content')
    @php
        $dummy_image = asset('assets/img/astrologer/dummy-image.png');
    @endphp
    <!-- Start contact section -->
    <section class="contact__section section--padding" style="padding-top: 2rem;">
        <div class="container">
            <div class="main__contact--area">
                <h1 class="fs-2 mb-3">Register As Astrologer</h1>
                <div class="astro-register">
                    <form class="row" action="{{ route('register_astrologer.create') }}" enctype="multipart/form-data" id="myForm">
                        <input type="hidden" value="CREATE" name="action">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Full Name">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="" placeholder="Email Id">
                                </div>
                                 <div class="col-md-4">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="" placeholder="Date of Birth">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Mobile</label>
                                    <input type="number" class="form-control" name="mobile" value="" placeholder="Mobile Number (10 Digit)">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">About</label>
                                    <textarea class="form-control" name="about" placeholder="Write Short Description about your Self ..."></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Language</label>
                                    <input type="text" class="form-control" name="language" value="" placeholder="Hindi, English, ...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Skills</label>
                                    <input type="text" class="form-control" name="skills" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Experience</label>
                                    <input type="text" class="form-control" name="experience" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Chat Price (₹/minute)</label>
                                    <input type="number" class="form-control" name="chat_price" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Call Price (₹/minute)</label>
                                    <input type="number" class="form-control" name="call_price" value="">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label">State</label>
                                    <select class="form-select state_select" name="state">
                                        <option value="">Select</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state }}">{{ $state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="form-label mt-4">Profile Image</label>
                                <div class="col-md-6">
                                    <img src="{{ $dummy_image }}" id="showBanner" class="show-banner border img-hover"
                                        data-dummy-image="{{ $dummy_image }}">
                                    <br><small>Image Size ({{ $img_wh }})</small>
                                    <input accept="image/*" type='file' name="image" id="inputBanner"
                                        class="invisible" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pb-3">
                            <button type="button" class="btn btn-primary fs-4 mt-4 disable_btn" onclick="submit_form()">
                                Submit
                                {!! Hpx::spinner() !!}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End contact section -->
@endsection

@section('script')
<script>

	$(document).ready(function(){
		image_edit('#showBanner');
	});

	function submit_form(){
		var x = new Ajx;
		x.form = '#myForm';
		x.ajxLoader('#myForm .loaderx');
		x.disableBtn('#myForm .disable_btn');
		x.globalAlert(true);
		x.reset = true;
		x.start(function(response){
			if(response.status == true){
				location.reload();
			}
		});
	}

</script>
@endsection
