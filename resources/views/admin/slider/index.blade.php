@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')
    <div class="admin-container">
        @php
            $tbx['tb'] = 1;
            $tbx['title'] = 'Slider List';
            $tbx['btn-name'] = 'Add';
            $tbx['btn-link'] = route('slider.create');
            $tbx['search-bar'] = true;

            $route_name = 'slider';
            $image_dir = 'assets/img/slider/';
        @endphp

        @include('admin.includes.title-bar')

        <div class="cart__table">
            <table class="cart__table--inner">
                <thead class="cart__table--header">
                    <tr class="cart__table--header__items">
                        <th class="cart__table--header__list">Slider</th>
                        <th class="cart__table--header__list">Status</th>
                        <th class="cart__table--header__list text-center">Reorder</th>
                        <th class="cart__table--header__list text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="cart__table--body" id="slider-list">
                    @foreach ($data_list as $data)
                        <tr class="cart__table--body__items">
                            <td class="cart__table--body__list">
                                <div class="cart__product d-flex align-items-center">
                                    <div class="cart__thumbnail">
                                        @include('admin.includes.thumbnail')
                                    </div>
                                    <div class="cart__content">
                                        <h3 class="cart__content--title h4">
                                            <a href="#">{{ Str::words($data->slider_name, 7, '...') }}</a>
                                        </h3>
                                        <span class="cart__content--variant">{{ Str::words($data->title, 7, '...') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cart__table--body__list">
                                @include('admin.includes.status-button')
                            </td>
                            <td class="cart__table--body__list text-center">
                                @include('admin.includes.reorder-input')
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

