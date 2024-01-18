<style>
    .ttlh{ height: 45px; font-size: 1.7rem;}
    .blog__items {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%);
    }
</style>
<!-- Start blog section -->
<section class="pb-5 pt-0">
    <div class="container blog__section--container">
        <div class="section__heading text-center mb-40">
            <h2 class="section__heading--maintitle">Our Blog Posts</h2>
            <span class="section__heading--subtitle">Our recent articles about Organic</span>
        </div>
        <div class="blog__section--inner blog__swiper--activation swiper">
            <div class="swiper-wrapper">
                @foreach($posts as $data)
                @php
                    $post_link = route('blog_details.page',$data->slug);
                @endphp
                <div class="swiper-slide">
                    <div class="blog__items">
                        <div class="blog__items--thumbnail">
                            <a class="blog__items--link" href="{{$post_link}}">
                                <img class="blog__items--img" src="{{Hpx::image_src('assets/img/post/thumbnail/'.$data->image,'assets/img/other/blog.jpg')}}" alt="{{$data->title}}" title="{{$data->title}}" />
                            </a>
                        </div>
                        <div class="blog__items--content">
                            <div class="blog__items--meta">
                                <ul class="d-flex">
                                    <li class="blog__items--meta__list">
                                        <svg class="blog__items--meta__icon" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                            <path  d="M75.809,63.836c0-.221,0-.429,0-.639a.915.915,0,0,0-.656-.869.959.959,0,0,0-1.057.321.97.97,0,0,0-.2.619v.559a.163.163,0,0,1-.164.161H72.716a.162.162,0,0,1-.164-.161c0-.192,0-.377,0-.564a.959.959,0,0,0-1.918-.06c-.005.206,0,.413,0,.62a.163.163,0,0,1-.164.161H69.428a.162.162,0,0,1-.164-.161,5.7,5.7,0,0,0-.009-.768.849.849,0,0,0-.627-.725.93.93,0,0,0-.942.185.952.952,0,0,0-.329.79c0,.175,0,.35,0,.533A.163.163,0,0,1,67.2,64H64.363a.162.162,0,0,0-.164.161V77.113a.163.163,0,0,0,.164.161H79.036a.162.162,0,0,0,.164-.161V64.158A.163.163,0,0,0,79.036,64H75.972A.161.161,0,0,1,75.809,63.836ZM68.7,76.636h-3.68a.162.162,0,0,1-.164-.161V73.913a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.561A.162.162,0,0,1,68.7,76.636Zm0-3.543H65.018a.162.162,0,0,1-.164-.161V70.224a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.708A.163.163,0,0,1,68.7,73.093Zm0-3.685H65.018a.162.162,0,0,1-.164-.161v-2.6a.163.163,0,0,1,.164-.161H68.7a.162.162,0,0,1,.164.161v2.6A.162.162,0,0,1,68.7,69.408Zm4.9,7.23H69.71a.162.162,0,0,1-.164-.161V73.921a.163.163,0,0,1,.164-.161H73.6a.162.162,0,0,1,.164.161v2.557A.16.16,0,0,1,73.6,76.638Zm.172-3.632c0,.05-.077.089-.169.089h-3.9a.162.162,0,0,1-.164-.161v-2.71c0-.089.043-.163.093-.166l.093-.005c1.282,0,2.563,0,3.844,0,.155,0,.208.034.207.2-.007.89,0,1.783-.005,2.672A.747.747,0,0,1,73.776,73.006Zm.005-3.694c0,.05-.074.091-.164.091H69.707a.162.162,0,0,1-.164-.161V66.636c0-.089.043-.161.1-.161h.1c1.282,0,2.563,0,3.844,0,.155,0,.207.036.2.2-.007.852,0,1.7,0,2.552v.091Zm.823.756h3.772a.162.162,0,0,1,.164.161v2.706a.163.163,0,0,1-.164.161H74.6a.162.162,0,0,1-.164-.161V70.227A.162.162,0,0,1,74.6,70.068Zm3.773,6.568H74.6a.162.162,0,0,1-.164-.161V73.918a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.557A.158.158,0,0,1,78.377,76.636Zm0-7.233H74.6a.162.162,0,0,1-.164-.161V66.648a.163.163,0,0,1,.164-.161h3.773a.162.162,0,0,1,.164.161v2.593A.159.159,0,0,1,78.377,69.4Z" transform="translate(-64.2 -62.274)" fill="currentColor"/>
                                        </svg>
                                        <span class="blog__items--meta__text">{{Hpx::mydate_month($data->created_at)}}</span>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="blog__items--title ttlh"><a href="{{$post_link}}">{{ Hpx::maxChar($data->title,70)}}</a></h3>
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
        <a href="{{route('blog.page')}}" class="btnx-outline fs-4">View All <i class="icofont-arrow-right"></i></a>
    </div>
</section>
<!-- End blog section -->
