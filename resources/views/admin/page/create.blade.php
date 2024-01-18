@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')

    <div class="admin-container">
        @php
            $tbx['tb'] = true;
            $tbx['back-btn'] = route('page.index');
            $tbx['title'] = 'New Page';
            $route_name = 'page';
            // $image_dir = 'assets/img/page/';
        @endphp
        @include('admin.includes.title-bar')

        <form class="row" action="{{ route($route_name . '.store') }}" enctype="multipart/form-data" id="myForm">
            <input type="hidden" value="CREATE" name="action">
            <input type="hidden" value="{{ $postx->id ?? null }}" name="post_block_id">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Slug</label>
                        <input type="text" class="form-control" readonly value="">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta Description</label>
                        <textarea class="form-control" rows="2" name="meta_description">

                        </textarea>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" value="">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Content</label>
                        <textarea class="form-control" id="html_content" name="content" hidden>
                        </textarea>
                    </div>
                    <div class="col-sm-12 position-relative">
                        <div class="position-absolute" style="right: 20px; top:10px;">
                            @include('admin.includes.media-library-button')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @include('admin.includes.save-button')
            </div>
        </form>
    </div>

    @include('admin.includes.media-library')

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            Laraberg.init('html_content');
            document.querySelector(
                "#myForm > div.col-md-12 > div > div:nth-child(6) > div > div > div > div.block-editor__header > div:nth-child(2) > button"
                ).click();
        });
    </script>
@endsection