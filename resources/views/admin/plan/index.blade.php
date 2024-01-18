@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('main-content')
    <div class="admin-container">
        @php
            $tbx['tb'] = 1;
            $tbx['title'] = 'Recharge Plans';
            $tbx['btn-name'] = 'Add';
            $tbx['btn-link'] = route('plan.create');
            $tbx['search-bar'] = true;
            $route_name = 'plan';
        @endphp

        @include('admin.includes.title-bar')

        <div class="cart__table">
            <table class="cart__table--inner">
                <thead class="cart__table--header">
                    <tr class="cart__table--header__items">
                        <th class="cart__table--header__list">Plans</th>
                        <th class="cart__table--header__list">Extra</th>
                        <th class="cart__table--header__list text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="cart__table--body" id="slider-list">
                    @foreach ($data_list as $data)
                        <tr class="cart__table--body__items">
                            <td class="cart__table--body__list">
                                <div class="cart__product d-flex align-items-center">
                                    <div class="cart__thumbnail">
                                        <i class="icofont-rupee fs-1 fw-normal"></i>
                                    </div>
                                    <div class="cart__content">
                                        <h3 class="cart__content--title fs-3 fw-bold">
                                            <a href="#">{{ $data->amount }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $data->extra }}%</td>
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

