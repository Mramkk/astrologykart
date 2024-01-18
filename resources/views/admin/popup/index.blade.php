@extends('admin.layouts.admin_layout')
@section('title',env('APP_NAME'))
@section('head')
@endsection

@section('main-content')
<div class="admin-container">

    @php
        $tbx['tb'] = 1;
        $tbx['title'] = 'All Popups';
        $tbx['btn-name'] = 'Add';
        $tbx['btn-link'] = route('popup.create');
        $tbx['search-bar'] = true;
        $route_name = 'popup';
        // $image_dir = 'assets/img/popup/';
    @endphp
    @include('admin.includes.title-bar')

    <div class="cart__table">
        <table class="cart__table--inner">
            {!! Hpx::table_headings(['Name','Delay','status','action:text-right']) !!}
            <tbody class="cart__table--body" id="slider-list">
                @foreach($data_list as $data)
                <tr class="cart__table--body__items">
                    <td class="cart__table--body__list">
                        <div class="cart__product d-flex align-items-center">
                            <div class="cart__thumbnail img-radius-50 astroimg">
                                <i class="icofont-cube fs-1"></i>
                            </div>
                            <div class="cart__content">
                                <span class="cart__content--variant fw-bold">
                                    <h3 class="cart__content--title">
                                        {{Str::words($data->name,8)}}
                                    </h3>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td class="cart__table--body__list">
                        {{$data->delay}}s
                    </td>
                    <td class="cart__table--body__list">
                        @include('admin.includes.status-button')
                    </td>
                    <td class="cart__table--body__list text-right">
                        @include('admin.includes.edit-button')
                        @include('admin.includes.delete-button')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12">
            {!! Hpx::paginator($data_list) !!}
        </div>
    </div>
</div>
@endsection


