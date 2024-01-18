<!-- Start breadcrumb section -->
<style>
    .breadcrumb__bg{
        background-color: #acacac;
        background-image: url('{{Hpx::imagex("assets/web/img/banner/breadcrumb-bg.jpg","assets/web/img/banner/breadcrumb-bg-mobile.jpg")}}');
        height: 240px;
    }
    .container-overlay{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        justify-items: center;
        background-color: #00000030;
    }
</style>
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container-overlay">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content text-center">
                    <h1 class="breadcrumb__content--title text-white mb-25">{{!empty($page_title) ? $page_title : env('APP_NAME')}}</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{asset('')}}">Home</a></li>
                        <li class="breadcrumb__content--menu__items"><span class="text-white">{{!empty($page_title) ? $page_title : 'IOA'}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->
