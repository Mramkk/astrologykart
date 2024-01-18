@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Refund & Cancellation</title>
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
@include('web.includes.breadcrumb', ['page_title' => 'Refund & Cancellation'])
    <section class="">
        <div class="container">
            <div class="page-content pt-5">
                <h2>Refund & Cancellation</h2>
                <ul>
                    <li>Money-Back Guarantee: If you are disappointed with our services, please contact us at info@astrologykart.com within 24 hours of making your payment. It will be launched by us and credited to your Astrology Kart wallet within 2-3 business days. Please remember that each user's refund will be handled only once, and no further refund requests will be granted. Unless you have already claimed your refund, you will not be eligible to receive a refund for future usage of any of our services. The reliability of a refund request will be determined solely at the discretion of Astrology Kart, and we reserve the overall right to approve or refuse the same according on the nature of the request.</li>
                    <li>If the Client provides misinformation, no refund or cancellation will be executed. The User pledges to be extra careful when sharing any details over their matter and to double-check while sending their concerns and interviewing our Astrologers.</li>
                    <li>If the User inputs a false mobile number when using our 'Talk To Astrologer' option, we will not accept any refunds or cancellations. Our customers are asked to remain their mobile phone numbers in a better network area and to answer anytime calls that come in. Astrology Kart may not be obliged in any manner for any refund or cancellation for any session that is connected.</li>
                    <li>As of present, the 'Talk to Astrologer' services is only available in India and non-Indians who add money to their Astrology Kart pocket to use this service will not be refunded. In such a circumstance, Astrology Kart accepts no responsibility.</li>
                    <li>Members/Users should not depend on or make any legal, health, financial, or other vital choices based on an Astrologer's advice.</li>
                    <li>Astrology Kart holds no duty or responsibility for the accuracy or performance of the Astrological solutions offered by the Astrologers.</li>
                    <li>Taking the assistance and consultation of Astrologers on Astrology Kart is purely at the Users' choices and will.</li>
                    <li>It is advisable that members/users are caution in such situations; Astrology Kart cannot provide a refund on such conditions.</li>
                    <li>In the occasion of a payment failure or delay due to server or network failures on Astrology Kart's website/app or on the payment gateway page tied with Astrology Kart, the User must review his/her bank account for any money deducted. If the sum has been deducted, please email us at info@astrologykart.com to tell us and validate successful payment. If the money is not deducted, you can re - submit your request for payment.</li>
                    <li>Astrology Kart reserves the right to refuse or cancel any Chat/Call session request made by the User for any basis. Your request may be terminated for a number of reasons, including, but not restricted to, a modification in the price conditions, failure of the service, or any other issue. If the User has paid for a service and it is cancelled, the amount paid will be credited to the User's Astrology Kart wallet.</li>
                    <li>If any user or member uses abusive or inappropriate language on the website or when connecting with our Astrologers in any means that includes chats, calls, then your Astrology Kart account will be suspended and your entire money in your Astrology Kart wallet will be seized. In such cases, you will not be able to claim a refund.</li>
                    <li>If any Astrology Kart Member/User breaches any of the terms listed in our Terms and Conditions then that User's account will be suspended immediately, and the cash in the User's Astrology Kart wallet will be freezed and the wallet amount not be refunded.</li>
                </ul>
            </div>
        </div>
    </section>
@endsection
