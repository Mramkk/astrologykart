@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('head')
@endsection

@section('main-content')
    <div class="admin-container">

        @php
            $tbx['tb'] = 1;
            $tbx['title'] = 'All Post';
            $tbx['btn-name'] = 'Add';
            $tbx['btn-link'] = route('post.create');
            $tbx['search-bar'] = true;
            $route_name = 'post';
            $image_dir = 'assets/img/post/';
        @endphp

        @include('admin.includes.title-bar')
        <div class="cart__table">
            <table class="cart__table--inner">
                @include('admin.includes.table_headings')
                {!! table_headings(['title', 'category', 'status', 'action:text-right']) !!}
                <tbody class="cart__table--body" id="slider-list">
                    @foreach ($data_list as $data)
                        <tr class="cart__table--body__items">
                            <td class="cart__table--body__list">
                                <div class="cart__product d-flex align-items-center">
                                    <div class="cart__thumbnail">
                                        @include('admin.includes.thumbnail')
                                    </div>
                                    <div class="cart__content">
                                        <span class="cart__content--variant fw-bold">
                                            <h3 class="cart__content--title">
                                                <a href="#">{{ Str::words($data->title,6) }}</a>
                                            </h3>
                                            <span class="text-black fs-5 me-1">
                                                {{ Hpx::mydate_month($data->created_at) }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="cart__table--body__list">
                                {{ $data->category }}
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
            <div class="col-12 links-border">
                {!! Hpx::paginator($data_list) !!}
            </div>
        </div>
    </div>
@endsection
