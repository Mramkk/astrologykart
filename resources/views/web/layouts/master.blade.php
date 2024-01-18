<!doctype html>
<html lang="en">

<head>
    @yield('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ============== favicons =========== -->
    <link rel="shortcut icon" href="{{ asset('assets/web/img/favicon/favicon.png') }}">
    <!-- ========= IconFont CSS ===========-->
    <link rel="stylesheet" href="{{ asset('assets/web/css/icofont.min.css') }}">
    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/plugins/swiper-bundle.min.css') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&amp;family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- =========== Plugin css =============== -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/vendor/bootstrap.min.css') }}">
    <!-- =========== Custom Style CSS ========= -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/web_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/custom.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style type="text/css">
        .swiper__nav--btn::after {
            background: url('{{ asset('assets/web/icon/left-arrow-angle.png') }}');
        }

        .swiper__nav--btn.swiper-button-next::after {
            background: url('{{ asset('assets/web/icon/right-arrow-angle.png') }}');
        }
    </style>
    <meta name="p:domain_verify" content="116b4cc7997d867127354719003cf2ed" />
    @yield('style')

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VC063DQC67"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VC063DQC67');
</script>
    <script type="application/ld+json" defer="" id="schemaDynamic">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "Astrology Kart",
          "alternateName": "Astrologykart",
          "url": "https://astrologykart.com/",
          "logo": "https://astrologykart.com/assets/img/logo/logo.png",
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91 9608494935",
            "contactType": "customer service",
            "areaServed": "IN",
            "availableLanguage": [
                {
                    "@type": "Language",
                    "name": "English"
                  },
                {
                    "@type": "Language",
                    "name": "Hindi"
                }
            ]
          },
          "sameAs": [
            "https://www.facebook.com/astrologykart",
            "https://twitter.com/astrologykart",
            "https://www.instagram.com/astrologykart/",
            "https://www.linkedin.com/company/astrologykart/",
            "https://www.youtube.com/channel/UCtIuuvkvmp16FdbWZGn29Tw"
          ]
        }
      </script>

</head>

<body>
    @include('web.layouts.header')
    <!-- ====== Main Content Start ===== -->
    <main class="main__content_wrapper">
        @yield('main-content')
    </main>
    <!-- ====== Main Content End ===== -->



    @yield('footer')

    @if (auth()->check() == false)
        @include('web.includes.login-modal')
    @endif

    <input type="hidden" id="is_login" value="{{ auth()->check() ? 1 : 0 }}">
    <!-- All Script JS Plugins here  -->
    <script src="{{ asset('assets/web/js/vendor/popper.js') }}" defer="defer"></script>
    <script src="{{ asset('assets/web/js/vendor/bootstrap.min.js') }}" defer="defer"></script>
    <script src="{{ asset('assets/web/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/plugins/glightbox.min.js') }}"></script>
    <!-- Customscript js -->
    <script src="{{ asset('assets/web/js/script.js') }}"></script>
    <script src="{{ asset('assets/web/js/classes.js') }}"></script>

    @include('web.layouts.footer')

    @yield('script')
</body>

</html>
