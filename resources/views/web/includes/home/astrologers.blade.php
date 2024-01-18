<style>
.home-astrologers .product__bg{
    background-color: unset;
    padding: 15px 0;
    border:1px solid var(--theme-color);
    box-shadow:0px 0px 5px 1px #fddfdf;
    border-radius: 1px;
}
.home-astrologers .product__bg img:hover{
    box-shadow:0px 0px 6px 2px #858585;
}
</style>
<!-- Start categories product section -->
<section class="home-astrologers py-5">
    <div class="container">
        <div class="section__heading text-center mb-40">
            <h2 class="section__heading--maintitle">Our Astrologers</h2>
            <span class="section__heading--subtitle">Talk to our best Astrologers</span>
        </div>
        <div class="product__section--inner product__swiper--activation swiper">
            <div class="swiper-wrapper">
            @foreach($astrologers as $data)
                <div class="swiper-slide py-3">
                    <div class="product__items product__bg" style="border-radius: 6px;">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="{{route('astrologer_profile.page',$data->slug ?? '---')}}">
                                <img class="product__items--img bg-light" src="{{asset('assets/img/astrologer/'.$data->image)}}" title="{{$data->name}}" alt="{{$data->name}}" style="width:100px;border-radius: 50%;margin: auto;margin-top: 20px;">
                                <div class="text-center">
                                    <div class="">
                                        <h4 class="product__categories--content__maintitle fs-3 pt-4">{{Str::words($data->name,3)}}</h4>
                                        <span class="product__categories--content__subtitle">{{Str::words($data->skills,3   )}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="swiper__nav--btn swiper-button-next"></div>
            <div class="swiper__nav--btn swiper-button-prev"></div>
        </div>
    </div>
    <div class="container text-end mt-2">
        <a href="{{route('talk_to_astrologer.page')}}" class="btnx-outline fs-4">View All <i class="icofont-arrow-right"></i></a>
    </div>
</section>

<!-- End categories product section -->
