<style>
    .banner-call-btn {
        display: inline-block;
        height: 45px;
        line-height: 43px;
        padding: 0px 20px;
        min-width: 130px;
        background-color: var();
        color: #ffffff;
        text-transform: capitalize;
        border: 1px solid white;
        border-radius: 25px;
        text-align: center;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -ms-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
    }

    .banner-call-btn:hover {
        background-color: var(--theme-color);
        color: white !important;
        border: 0;
    }

    .banner__bg {
        background-image: url('{{ Hpx::imagex('assets/web/img/banner/banner-bg.jpg','assets/web/img/banner/banner-bg-mobile.jpg') }}');
        background-repeat: no-repeat;
        background-position: center;
        background-color: #eee;
        background-size: cover;
        padding: 7rem 0;
        border-radius: 10px;
    }

    .banner__title {
        font-size: 3rem;
        line-height: 3.8rem;
    }

    @media only screen and (max-width:550px){
        .banner__bg{
            padding: 25px 0;
        }
    }
</style>

<section class="bg__gray--color p-4" style="background-color: var(--theme-light-color);">
    <div class="container banner__bg" >
        <div class="w-100 text-center">
            <h1 class="banner__title text-white fw-bold px-3">
                Get Your First Consultation For Only ₹1
            </h1>
            <a href="{{ route('talk_to_astrologer.page') }}" class="banner-call-btn text-white mt-5">
                Call Now
                <svg class="banner__two--content__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="10.383"
                    height="7.546" viewBox="0 0 10.383 7.546">
                    <path data-name="Path 77287"
                        d="M10.241,45.329l-3.09-3.263a.465.465,0,0,0-.683,0,.53.53,0,0,0,0,.721l2.266,2.393H.483a.511.511,0,0,0,0,1.02H8.734L6.469,48.592a.53.53,0,0,0,0,.721.465.465,0,0,0,.683,0l3.09-3.263A.53.53,0,0,0,10.241,45.329Z"
                        transform="translate(0 -41.916)" fill="currentColor"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
