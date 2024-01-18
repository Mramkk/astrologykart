<style>
    .srvsbox .shipping__items2 {
        cursor: pointer;
    }

    .srvsbox .shipping__items2:hover .shipping__items2--content__title {
        color: var(--secondary-color) !important;
        transition: 0.3s;
    }
</style>
<section class="bg__gray--color pt-2 pb-4 srvsbox" style="background-color: var(--theme-light-color);">
    <div class="container">
        <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between"
            style="box-shadow: unset; background-color:unset;">
            <a href="{{route('chat_with_astrologer.page')}}">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/web/img/home/icon-block-1.png" alt="shipping img" style="max-height: 60px;">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Chat with Astrologer</h2>
                        <p class="shipping__items2--content__desc">Chat with our Astrologers</p>
                    </div>
                </div>
            </a>
            <a href="{{route('talk_to_astrologer.page')}}">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/web/img/home/icon-block-2.png" style="max-height: 60px;"
                            alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Talk To Astrologer</h2>
                        <p class="shipping__items2--content__desc">Talk to our Astrologers</p>
                    </div>
                </div>
            </a>
            <a href="{{route('register_as_astrologer.page')}}">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/web/img/home/icon-block-3.png" style="max-height: 60px;"
                            alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Register as Astrologer</h2>
                        <p class="shipping__items2--content__desc">Join with us as Astrologer</p>
                    </div>
                </div>
            </a>
            <a href="{{route('blog.page')}}">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/web/img/home/icon-block-4.png" style="max-height: 60px;"
                            alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Daily Blogs</h2>
                        <p class="shipping__items2--content__desc">Astrologykart blogs</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
