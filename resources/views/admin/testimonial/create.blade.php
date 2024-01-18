@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')

<div class="admin-container">
	@php
        $tbx['tb'] = true;
        $tbx['title'] = 'Add Testimonial';
        $tbx['back-btn'] = route('testimonial.index');
        $route_name = 'testimonial';
        $image_dir = 'assets/img/testimonial/';
    @endphp
    @include('admin.includes.title-bar')

	<form class="row" action="{{route($route_name.'.store')}}" enctype="multipart/form-data" id="myForm">
		<input type="hidden" value="CREATE" name="action">
		<div class="col-md-7">
			<div class="col-12">
				<label for="" class="form-label">Name</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="col-12">
				<label for="" class="form-label">Place</label>
				<input type="text" class="form-control" name="place">
			</div>
			<div class="col-12">
				<label class="form-label">Message</label>
				<textarea class="form-control" name="message"></textarea>
			</div>
			<div class="col-12">
				<label class="form-label">Status</label>
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
