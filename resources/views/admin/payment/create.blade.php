@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')

    <div class="admin-container">
        @php
            $tbx['tb'] = true;
            $tbx['back-btn'] = route('plan.index');
            $tbx['title'] = 'Add Plan';
            $route_name = 'plan';
        @endphp
        @include('admin.includes.title-bar')

        <form class="row" action="{{ route($route_name . '.store') }}" enctype="multipart/form-data" id="myForm">
            <input type="hidden" value="CREATE" name="action">
            <div class="col-md-4">
                <label for="" class="form-label">Amount</label>
                <input type="number" class="form-control" name="amount">
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Extra</label>
                <input type="number" class="form-control" name="extra">
            </div>
            <div class="col-md-12">
                @include('admin.includes.save-button')
            </div>
        </form>
    </div>
@endsection
