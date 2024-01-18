@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')


    <div class="admin-container">
        @php
            $tbx['tb'] = true;
            $tbx['back-btn'] = route('slider.index');
            $tbx['title'] = 'Edit Slider';
            $route_name = 'slider';
            $image_dir = 'assets/img/slider/';
        @endphp
        @include('admin.includes.title-bar')

        <form class="row" action="{{ route($route_name . '.store') }}" enctype="multipart/form-data" id="myForm">
            <input type="hidden" value="UPDATE" name="action">
            <input type="hidden" value="{{ $data->id }}" name="id">
            <div class="col-md-7">
                <div class="col-12">
                    <label for="" class="form-label">Slider Name</label>
                    <input type="text" class="form-control" value="{{ $data->slider_name }}" name="slider_name">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Title</label>
                    <input type="text" class="form-control" value="{{ $data->title }}" name="title">
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description">{{ $data->description }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Button Name</label>
                    <input type="text" class="form-control" value="{{ $data->button_name }}" name="button_name">
                </div>
                <div class="col-12">
                    <label class="form-label">Button Link</label>
                    <input type="text" class="form-control" value="{{ $data->button_link }}" name="button_link">
                </div>
                <div class="col-12">
                    <label for="inputState" class="form-label">Slider Order</label>
                    <input type="text" class="form-control" value="{{ $data->serial_no }}" name="serial_no">
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


@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            image_edit('#showBanner', '{{ route($route_name . '.store') }}', 'DELETE_IMAGE', {{ $data->id }},
                'image');
        });

        function submit_form() {
            var x = new Ajx;
            x.form = '#myForm';
            x.ajxLoader('#myForm .loaderx');
            x.disableBtn('#myForm .disable_btn');
            x.globalAlert(true);
            x.start();
        }
    </script>
@endsection
