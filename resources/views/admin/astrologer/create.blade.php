@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')

    <div class="admin-container">

        @php
            $tbx['tb'] = true;
            $tbx['back-btn'] = route('astrologer.index');
            $tbx['title'] = 'Add Astrologer';
            $route_name = 'astrologer';
            $image_dir = 'assets/img/astrologer/';
        @endphp

        @include('admin.includes.title-bar')

        <form class="row" action="{{ route($route_name . '.store') }}" enctype="multipart/form-data" id="myForm">
            <input type="hidden" value="CREATE" name="action">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile</label>
                        <input type="number" class="form-control" name="mobile" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Language</label>
                        <input type="text" class="form-control" name="language" value="">
                    </div>
                    <div class="col-12">
                        <label class="form-label">about</label>
                        <textarea class="form-control" name="about"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Skills</label>
                        <input type="text" class="form-control" name="skills" value="">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Experience</label>
                        <input type="text" class="form-control" name="experience" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Chat Price (₹/minute)</label>
                        <input type="number" class="form-control" name="chat_price" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Call Price (₹/minute)</label>
                        <input type="number" class="form-control" name="call_price" value="">
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">State</label>
                        <select class="form-select state_select" name="state">
                            <option value="">Select</option>
                            @foreach ($states as $state)
                                <option value="{{ $state }}">{{ $state }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">Status</label>
                        @include('admin.includes.select-status')
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
        const options = {
            imageEditing: true,
        };

        $(document).ready(function() {
            Laraberg.init('html_content', options);
            // $('.state_select').select2();
        });
    </script>
@endsection

