@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Disclaimer</title>
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="theme-color" content="#ff230b">
    <meta name="copyright" content="astrologykart.com">
    <meta property="og:site_name" content="Astrology kart">
    <meta property="og:type" content="website">
    <meta name="MobileOptimized" content="320">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('main-content')
@include('web.includes.breadcrumb', ['page_title' => 'Disclaimer'])
    <section class="">
        <div class="container">
            <div class="page-content pt-5">
                <h2>Disclaimer</h2>
                <p>Astrology Kart provides a platform for one-on-one interaction between users and Astrologers via direct consultation (chat or call) as well as the ability for users to pay for services requested from an Astrologer. We can ensure your happiness with the counselling services offered by Astrologers on our platform, but we cannot guarantee or verify the accuracy, honesty, or success of the advice, responses, or other service delivered by Astrologers to you through our website and application.</p>
                <p>The website and application are offered to you "as is" with no warranties. You use the Astrology Kart website and application at your own risk, with no guarantee of fitness, reliability, or performance failure. We cannot promise that the services, assistance, and features granted to you by Astrology Kart will be error-free, impartial, or defect-free. Astrology Kart bears no responsibility for the quality or legitimacy of the information, support, services, or information offered by the Astrologers. Please keep in mind that by visiting, or accessing the website, you are automatically agreeing to the conditions outlined in this Disclaimer. You acknowledge that by submitting a query on the Astrology Kart platform, you accept and understand that Astrology Kart will not be held liable for any usage or action you take based on the response or information you receive or fail to receive.</p>
                <p>You recognize and acknowledge that any usage or action you take based on the advice, services, or answers is entirely at your own risk, and Astrology Kart will not be held liable for any loss, suffering, or damage that arises if you trust and depend on these answers. Furthermore, you explicitly agree not to hold Astrology Kart liable for any loss, suffering, or injury resulting from your filing of the inquiry or your use of or trust on any answer. Astrology Kart maintains the right to make modifications at any moment.</p>
            </div>
        </div>
    </section>
@endsection
