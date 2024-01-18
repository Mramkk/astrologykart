<!-- Start breadcrumb section -->
<style>
    .breadcrumb__bg{
        background-color: #eeeeee !important;
        background-image: none;
        height: 50px;
        color: #303030;
    }
    .container-overlay{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        justify-items: center;
        background-color:none;
    }
    .breadcrumb__content--menu li a {
        font-size: 16px;
    }
</style>
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content">
                    <ul class="breadcrumb__content--menu d-flex">
                        <li class="breadcrumb__content--menu__items"><a href="{{asset('/')}}">Home</a></li>
                        @if(!empty($text1))<li class="breadcrumb__content--menu__items"><a href="{{$link1 ?? null}}">{{ $text1 }}</a></li>@endif
                        @if(!empty($text2))<li class="breadcrumb__content--menu__items"><a href="{{$link2 ?? null}}">{{ $text2 }}</a></li>@endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->
