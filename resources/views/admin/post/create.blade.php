@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')

    <div class="admin-container">
        @php
            $tbx['tb'] = true;
            $tbx['back-btn'] = route('post.index');
            $tbx['title'] = 'New Post';
            $route_name = 'post';
            $image_dir = 'assets/img/post/';
        @endphp
        @include('admin.includes.title-bar')

        <form class="row" action="{{ route($route_name . '.store') }}" enctype="multipart/form-data" id="myForm">
            <input type="hidden" value="CREATE" name="action">
            <input type="hidden" value="{{$postx->id ?? null}}" name="post_block_id">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$postx->post_title ?? null}}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Slug</label>
                        <input type="text" class="form-control" readonly value="">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$postx->meta_title ?? null}}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta Description</label>
                        <textarea class="form-control" rows="2" name="meta_description">
                            {{ $postx->meta_description ?? null }}
                        </textarea>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" value="{{$postx->meta_keywords ?? null}}">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta Author Name</label>
                        <input type="text" class="form-control" name="author_name" value="Admin">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Content</label>
                        <textarea class="form-control" id="html_content" name="content" hidden>
                            {{$postx->post_content ?? null}}
                        </textarea>
                    </div>

                    <div class="col-sm-4">
                        <label for="" class="form-label">Category</label>
                        @include('admin.includes.post-categories')
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">Status</label>
                        @include('admin.includes.select-status')
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">Media Library</label>
                        @include('admin.includes.media-library-button')
                    </div>
                    <div class="col-md-6">
                        @include('admin.includes.input-image')
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
            document.querySelector("#myForm > div.col-md-12 > div > div:nth-child(7) > div > div > div > div.block-editor__header > div:nth-child(2) > button").click();
        });
    </script>
@endsection
