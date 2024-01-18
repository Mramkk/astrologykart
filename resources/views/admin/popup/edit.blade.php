@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')

    <div class="admin-container">

        @php
            $tbx['tb'] = true;
            $tbx['back-btn'] = route('popup.index');
            $tbx['title'] = 'Edit Popup';
            $route_name = 'popup';
            $image_dir = 'assets/img/popup/';
        @endphp

        @include('admin.includes.title-bar')

        <form class="row" action="{{ route($route_name . '.store') }}" enctype="multipart/form-data" id="myForm">
            <input type="hidden" value="UPDATE" name="action">
            <input type="hidden" value="{{ $data->id }}" name="id">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label">Popup Name</label>
                        <input type="text" class="form-control" name="name" value="{{$data->name}}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Html Content</label>
                        <textarea name="html_content" id="" style="height: 400px; width:100%;" class="border px-3">{{$data->html_content}}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Delay (in Second)</label>
                        <input type="text" class="form-control" name="delay" placeholder="Hint - 5" value="{{$data->delay}}">
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">Status</label>
                        @include('admin.includes.select-status')
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

