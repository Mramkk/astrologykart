@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')
    <div class="admin-container">
        @php
            $tbx['tb'] = true;
            $tbx['title'] = 'Post Categories';
            $tbx['btn-name'] = 'Add';
            $tbx['btn-link'] = route('post-category.create');
            $tbx['search-bar'] = true;
            $route_name = 'post-category';
            $image_dir = 'assets/img/post-category/';
        @endphp
        @include('admin.includes.title-bar')
        <div class="cart__table">
            <table class="cart__table--inner">
                @include('admin.includes.table_headings')
                {!! table_headings(['category', 'status', 'action:text-right']) !!}
                <tbody class="cart__table--body">
                    @foreach ($data_list as $data)
                        <tr class="cart__table--body__items">
                            <td class="cart__table--body__list">
                                <div class="cart__product d-flex align-items-center">
                                    <div class="cart__thumbnail">
                                        @include('admin.includes.thumbnail')
                                    </div>
                                    <div class="cart__content">
                                        <h3 class="cart__content--title h4"><a href="#">{{ $data->name }}</a></h3>
                                        <span class="cart__content--variant">{{ $data->slug }}</span>
                                        <span
                                            class="cart__content--variant fw-bold text-truncate">{{ Str::words($data->description, 5) }}</span>
                                    </div>
                                </div>
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
        </div>
    </div>
@endsection

