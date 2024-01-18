@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('head')
@endsection

@section('main-content')
    <div class="admin-container">

        @php
            $tbx['tb'] = 1;
            $tbx['title'] = 'All Pages';
            $tbx['btn-name'] = 'Add';
            $tbx['btn-link'] = route('page.create');
            $tbx['search-bar'] = true;
            $route_name = 'page';
            // $image_dir = 'assets/img/page/';
        @endphp

        @include('admin.includes.title-bar')
        <div class="cart__table">
            <table class="cart__table--inner">
                @include('admin.includes.table_headings')
                {!! table_headings(['title','action:text-right']) !!}
                <tbody class="cart__table--body" id="slider-list">
                    @foreach ($data_list as $data)
                        <tr class="cart__table--body__items">
                            <td class="cart__table--body__list">
                                <div class="cart__product d-flex align-items-center">
                                    <div class="cart__thumbnail">
                                        <i class="icofont-page display-3" style="color: #295d9f;"></i>
                                    </div>
                                    <div class="cart__content">
                                        <span class="cart__content--variant fw-bold">
                                            <h3 class="cart__content--title">
                                                <a href="{{route('city.page',$data->slug)}}" target="_blank">{{ Str::words($data->title,10) }}</a>
                                            </h3>
                                            <span class="text-black fs-5 me-1">
                                                {{ Hpx::mydate_month($data->created_at) }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="cart__table--body__list text-right">
                                @include('admin.includes.edit-button')
                                @include('admin.includes.delete-button')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-12 links-border">
                {!! Hpx::paginator($data_list) !!}
            </div>
        </div>
    </div>
@endsection
