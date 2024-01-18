@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('head')
@endsection

@section('main-content')

<div class="admin-container">
    @php
        $tbx['tb'] = 1;
        $tbx['title'] = 'Customer List';
        $tbx['search-bar'] = true;
        $route_name = 'customer';
        $image_dir = 'assets/img/userprofile/';
    @endphp

    @include('admin.includes.title-bar')

    <div class="cart__table">
        <table class="cart__table--inner">
            @include('admin.includes.table_headings')
            {!! table_headings(['Customer', 'Date', 'Gender', 'Mobile', 'City', 'Status', 'action:text-right']) !!}
            <tbody class="cart__table--body">
                @foreach ($data_list as $data)
                    <tr class="cart__table--body__items">
                        <td class="cart__table--body__list">
                            <div class="cart__product d-flex align-items-center">
                                <div class="cart__thumbnail">
                                    @include('admin.includes.thumbnail')
                                </div>
                                <div class="cart__content">
                                    <span class="cart__content--variant">
                                        <h3 class="cart__content--title text-capitalize fw-bold">
                                            {{ !empty($data->name) ? strtolower($data->name) : 'User'}}
                                        </h3>
                                        <span class="text-black fs-4 me-1">
                                            {{ $data->email }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="cart__table--body__list">
                            {{ date('d-m-Y h:i A', strtotime($data->created_at))  ?? 'N/A' }}
                        </td>
                        <td class="cart__table--body__list">
                            {{ $data->gender ?? 'N/A' }}
                        </td>
                        <td class="cart__table--body__list">
                            {{ $data->mobile }}
                        </td>
                        <td class="cart__table--body__list">
                            {{ $data->city ?? 'N/A' }}
                        </td>
                        <td class="cart__table--body__list">
                            @include('admin.includes.status-button')
                        </td>
                        <td class="cart__table--body__list text-right">
                            @include('admin.includes.view-button')
                            @include('admin.includes.delete-button')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12 links-border">
            {{ $data_list->OnEachSide(5)->links() }}
        </div>
    </div>
</div>
@endsection

@section('style')
    <style type="text/css">
        .cart__content--title {
            margin-bottom: 0;
        }

        .cart__thumbnail img {
            border-radius: 50% !important;
            max-width: 60px !important;
            max-height: 60px !important;
        }
    </style>
@endsection
