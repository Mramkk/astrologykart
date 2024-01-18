@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')
    <div class="admin-container">

        @php
            $tbx['tb'] = true;
            $tbx['back-btn'] = route('post-category.index');
            $tbx['title'] = 'Edit Post-Category';
            $route_name = 'post-category';
            $image_dir = 'assets/img/post-category/';
        @endphp
        @include('admin.includes.title-bar')

        <form class="row" action="{{ route('post-category.store') }}" enctype="multipart/form-data" id="myForm">
            <input type="hidden" value="UPDATE" name="action">
            <input type="hidden" value="{{ $data->id }}" name="id">
            <div class="col-md-8">
                <div class="col-12">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $data->name }}" name="name">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Slug</label>
                    <input type="text" class="form-control" value="{{ $data->slug }}" name="slug" readonly>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description">{{ $data->description }}</textarea>
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Status</label>
                    @include('admin.includes.select-status')
                </div>
            </div>
            <div class="col-md-3">
                @include('admin.includes.input-image')
            </div>
            <div class="col-12">
                @include('admin.includes.save-button')
            </div>
        </form>
    </div>
@endsection
