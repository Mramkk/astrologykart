@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')

    <div class="admin-container">
        @php
            $tbx['tb'] = true;
            $tbx['back-btn'] = route('slider.index');
            $tbx['title'] = 'Add Slider';
            $route_name = 'slider';
            $image_dir = 'assets/img/slider/';
        @endphp
        @include('admin.includes.title-bar')

        <form class="row" action="{{ route($route_name . '.store') }}" enctype="multipart/form-data" id="myForm">
            <input type="hidden" value="CREATE" name="action">
            <div class="col-md-7">
                <div class="col-12">
                    <label for="" class="form-label">Slider Name</label>
                    <input type="text" class="form-control" name="slider_name">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Button Name</label>
                    <input type="text" class="form-control" name="button_name">
                </div>
                <div class="col-12">
                    <label class="form-label">Button Link</label>
                    <input type="text" class="form-control" name="button_link">
                </div>
                <div class="col-12">
                    <label for="inputState" class="form-label">Slider Order</label>
                    <input type="text" class="form-control" name="serial_no">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Status</label>
                    @include('admin.includes.select-status')
                </div>
            </div>
            <div class="col-md-5">
                @include('admin.includes.input-image')
            </div>
            <div class="col-12">
                @include('admin.includes.save-button')
            </div>
        </form>

    </div>
@endsection

