<!-- Start header area -->
<style>
    .header__menu--navigation .header__menu--link {
        font-weight: 500;
        color: #181818;
    }
</style>
<header class="header__section header__transparent bg-white" style="box-shadow: 0 2px 4px #ccc;">
    <div class="main__header header__sticky">
        <div class="container">
            <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                <div class="offcanvas__header--menu__open ">
                    <span class="offcanvas__header--menu__open--btn" data-offcanvas>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg"
                            viewBox="0 0 512 512">
                            <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352" />
                        </svg>
                        <span class="visually-hidden">Offcanvas Menu Open</span>
                    </span>
                </div>
                <div class="main__logo">
                    <h2><a class="main__logo--link" href="{{ route('home.page') }}"><img class="main__logo--img"
                                src="{{ asset('assets/img/logo/logo.png') }}" style="max-height: 50px"
                                alt="logo-img"></a></h2>
                </div>
                <div class="position__relative d-flex justify-content-between align-items-center">
                    <div class="header__menu d-none d-lg-block me-5">
                        <nav class="header__menu--navigation">
                            <ul class="d-flex">
                                <li class="header__menu--items">
                                    <a class="header__menu--link fw-500"
                                        href="{{ route('talk_to_astrologer.page') }}">Talk to Astrologer </a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link fw-500"
                                        href="{{ route('chat_with_astrologer.page') }}">Chat with Astrologer </a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link fw-500"
                                        href="{{ route('register_as_astrologer.page') }}">Register as Astrologer </a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link fw-500" href="{{ route('blog.page') }}">Blog </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header__account">
                        <ul class="d-flex">
                            <li class="header__account--items header__menu--items d-lg-block">
                                @if (auth()->check())
                                    <span class="header__account--btn" style="cursor:pointer;width:9rem; border-radius:30px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32" />
                                            <path
                                                d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                stroke-width="32" />
                                        </svg>
                                        <span class="visually-hidde">Account</span>
                                    </span>
                                    <ul class="header__sub--menu" style="left:initial; right:0; text-indent:2rem;">
                                        <div class="text-center">
                                            <a href="{{ route('account.page') }}">
                                                <img src="@if (!empty($user->image) and file_exists('assets/img/userprofile/' . $user->image)) {{ asset('assets/img/userprofile/' . $user->image) }} @else {{ asset('assets/img/userprofile/user.png') }} @endif"
                                                    alt="user profile" class="img-fluid"
                                                    style="width: 80px; height: 80px;">

                                                <h4>{{ auth()->user()->name }}</h4>
                                                <h5>{{ auth()->user()->mobile }}</h5>
                                            </a>
                                        </div>
                                        <hr>
                                        @if (auth()->user()->type == 'admin')
                                            <li class="header__sub--menu__items"><a
                                                    href="{{ route('admin.dashboard') }}"
                                                    class="header__sub--menu__link">
                                                <!--<i class="icofont-institution"></i>-->
                                                    Admin Panel</a></li>
                                        @endif
                                            <!--<li class="header__sub--menu__items"><a href="{{ route('account.page') }}"-->
                                            <!--        class="header__sub--menu__link"><i class="icofont-user-alt-7"></i>-->
                                            <!--        My Account</a></li>-->
                                            <li class="header__sub--menu__items"><a class="header__sub--menu__link "
                                                href="#"> Notification</a>
                                        </li>
                                        <li class="header__sub--menu__items"><a class="header__sub--menu__link "
                                                href="{{route('payment_history.page')}}">Wallet Transactions <span> ₹ {{$user->balance}}</span></a>
                                        </li>
                                        <li class="header__sub--menu__items"><a class="header__sub--menu__link "
                                                href="#"> Order History</a>
                                        </li>
                                        <li class="header__sub--menu__items"><a class="header__sub--menu__link "
                                                href="#"> Customer Support Chat</a>
                                        </li>
                                        
                                        <li class="header__sub--menu__items"><a
                                                class="header__sub--menu__link text-danger"
                                                href="{{ route('logout') }}"><i class="icofont-logout"></i> Logout</a>
                                        </li>
                                    </ul>
                                @else
                                    <span class="header__account--btn" style="cursor:pointer;width:7.5rem; border-radius:30px;" data-open="user-login-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32" />
                                            <path
                                                d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                stroke-width="32" />
                                        </svg>
                                        <span class="visually-hidde">Login</span>
                                    </span>
                                @endif

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Offcanvas header menu -->
    <div class="offcanvas__header">
        <div class="offcanvas__inner">
            <div class="offcanvas__logo">
                <a class="offcanvas__logo_link" href="{{ route('home.page') }}">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Grocee Logo" width="158" height="36">
                </a>
                <button class="offcanvas__close--btn" data-offcanvas>close</button>
            </div>
            <nav class="offcanvas__menu">
                <ul class="offcanvas__menu_ul">
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="{{ route('talk_to_astrologer.page') }}">
                            Talk to Astrologer
                        </a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="{{ route('chat_with_astrologer.page') }}">
                            Chat with Astrologer
                        </a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="{{ route('register_as_astrologer.page') }}">
                            Register as Astrologer
                        </a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="{{ route('blog.page') }}">
                            Our Daily Blogs
                        </a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="{{ route('city_wise_astrologers.page') }}">
                            City Wise Astrologer
                        </a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="{{ route('about.page') }}">
                            About Us
                        </a>
                    </li>
                    <li class="offcanvas__menu_li">
                        <a class="offcanvas__menu_item" href="{{ route('contact.page') }}">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Offcanvas header menu -->


</header>
<!-- End header area -->
