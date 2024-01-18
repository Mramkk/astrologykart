@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')

    <div class="admin-container">

        @php
            $tbx['tb'] = true;
            $tbx['title'] = 'Edit Testimonial';
            $tbx['back-btn'] = route('testimonial.index');
            $route_name = 'testimonial';
            $image_dir = 'assets/img/testimonial/';
        @endphp
        @include('admin.includes.title-bar')

        <form class="row" action="{{ route($route_name . '.store') }}" enctype="multipart/form-data" id="myForm">
            <input type="hidden" value="UPDATE" name="action">
            <input type="hidden" value="{{ $data->id }}" name="id">
            <div class="col-md-7">
                <div class="col-12">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $data->name }}" name="name">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Place</label>
                    <input type="text" class="form-control" value="{{ $data->place }}" name="place">
                </div>
                <div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" name="message">{{ $data->message }}</textarea>
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Status</label>
                    @include('admin.includes.select-status')
                </div>
            </div>

            <div class="col-sm-5">
                @include('admin.includes.input-image')
            </div>

            <div class="col-12">
                @include('admin.includes.save-button')
            </div>
        </form>

    </div>
@endsection
