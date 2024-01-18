<style>
    .ml_img_box .portfolio__items--thumbnail{
        max-height: 115px;
        overflow: hidden;
    }
    .ml_img_box .portfolio__items--thumbnail__img{
        width: 100%;
        height: 100%;
    }
    .ml_img_box .portfolio__view--icon {
        width: 100%;
        text-align: center;
        font-size: 2.5rem;
    }
    .ml_img_box .portfolio__view--icon__link {
        margin: 1rem;
    }
    .ml_img_box .portfolio__view--icon__link i{
        color: white;
    }
    .ml_img_box .portfolio__view--icon__link i:hover{
        color: #c9c8c8;
        cursor: pointer;
    }

</style>
<div class="modal" id="media_library_modal" data-animation="slideInUp">
    <div class="modal-dialog quickview__main--wrapper">
        <header class="modal-header quickview__header">
            <button class="close-modal quickview__close--btn" aria-label="close modal" data-close="">✕ </button>
        </header>
        <div class="quickview__inner">
            <div class="">
                <h3 class="contact__form--title mb-10">Media Library</h3>

                <form action="{{route('media-library.store')}}" class="row bg-light p-3 pb-2 border-radius-5 mb-3" id="ml_form" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="action" value="UPLOAD" />
                    <div class="col-auto">
                        <input class="form-control" type="file" accept="image/*" id="upload_image_file" name="image">
                    </div>
                    <div class="col-auto">
                      <input type="text" class="form-control" name="name" placeholder="Image Name (Optional)">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3 fs-4 ml_btn">
                            Upload
                            {!! Hpx::spinner() !!}
                        </button>
                    </div>
                </form>

                <!-- Start portfolio section -->
                <section class="portfolio__section">
                    <div class="container">
                        <div class="portfolio__section--inner">
                            <div class="row row-cols-lg-4 row-cols-md-4 row-cols-sm-3 row-cols-3 mb--n30" id="media_library--images">

                            </div>
                        </div>
                    </div>
                </section>
                <!-- End portfolio section -->

                <div class="w-100 text-center mt-5 pt-4">
                    <button class="btn btn-primary fs-5" id="load_more_btn">
                        Load More
                        {!! Hpx::spinner() !!}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        loadMediaLibrary(0);
        $('#ml_form .ml_btn').click(function(){
            var x = new Ajx;
            x.form = '#ml_form';
            x.ajxLoader('#ml_form .loaderx');
            x.disableBtn('#ml_form .ml_btn');
            x.globalAlert(true);
            x.reset = true;
            x.start(function(response){
                if(response.status == true){
                    loadMediaLibrary(0);
                }
            });
        });

        $('#load_more_btn').click(function(){
            loadMediaLibrary();
        });
    });

    function loadMediaLibrary(next_no='x'){
        var next = next_no != 'x' ? next_no : ($('.ml_img_box').length==undefined ? 0 : $('.ml_img_box').length);
        var x = new Ajx;
        x.actionUrl('{{route("media-library.store")}}');
        x.ajxLoader('#load_more_btn .loaderx');
        x.disableBtn('#load_more_btn');
        x.passData('next',next);
        x.passData('action','GET_IMAGES');
        x.globalAlert(false);
        x.start(function(response){
            if(response.status == true){
                if(next_no == 'x'){
                    $('#media_library--images').append(response.data);
                }else{
                    $('#media_library--images').html(response.data);
                }
            }
        });
    }

    function CopyMediaUrl(data) {
        navigator.clipboard.writeText(data);
        globalAlert('URL Copied.','alert-success');
    }

    function delMediaImg(elm,img_name){
        if (confirm("Are you sure want to delete this image.") == true){
            $(elm).closest('.ml_img_box').remove();
            var x = new Ajx;
            x.actionUrl('{{route("media-library.store")}}');
            x.passData('name',img_name);
            x.passData('action','DELETE');
            x.globalAlert(true);
            x.start();
        }
    }

</script>
