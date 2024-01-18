@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')


    <div class="admin-container">
        @php
            $tbx['tb'] = true;
            $tbx['back-btn'] = route('plan.index');
            $tbx['title'] = 'Edit Plan';
            $route_name = 'plan';
            // $image_dir = 'assets/img/--';
        @endphp
        @include('admin.includes.title-bar')

        <form class="row" action="{{ route($route_name . '.store') }}" enctype="multipart/form-data" id="myForm">
            <input type="hidden" value="UPDATE" name="action">
            <input type="hidden" value="{{ $data->id }}" name="id">
            <div class="col-md-4">
                <label for="" class="form-label">Amount</label>
                <input type="number" class="form-control" name="amount" value="{{$data->amount}}">
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Extra(%)</label>
                <input type="number" class="form-control" name="extra" value="{{$data->extra ?? '0'}}">
            </div>
            <div class="col-md-12">
                @include('admin.includes.save-button')
            </div>
        </form>

    </div>
@endsection
