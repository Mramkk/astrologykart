@extends('admin.layouts.admin_layout')
@section('title',env('APP_NAME'))
@section('head')
@endsection

@section('main-content')
<div class="admin-container">

    @php
        $tbx['tb'] = 1;
        $tbx['title'] = 'All Astrologers';
        $tbx['btn-name'] = 'Add';
        $tbx['btn-link'] = route('astrologer.create');
        $tbx['search-bar'] = true;
        $route_name = 'astrologer';
        $image_dir = 'assets/img/astrologer/';
    @endphp
    @include('admin.includes.title-bar')

    <div class="cart__table">
        <table class="cart__table--inner">
            {!! Hpx::table_headings(['Name','Date','Skills','Mobile','status','Reorder:text-center','action:text-right']) !!}
            <tbody class="cart__table--body" id="slider-list">
                @foreach($data_list as $data)
                <tr class="cart__table--body__items">
                    <td class="cart__table--body__list">
                        <div class="cart__product d-flex align-items-center">
                            <div class="cart__thumbnail img-radius-50 astroimg">
                                @include('admin.includes.thumbnail')
                            </div>
                            <div class="cart__content">
                                <span class="cart__content--variant fw-bold">
                                    <h3 class="cart__content--title">
                                        {{Str::words($data->name,5)}}
                                    </h3>
                                    <span class="text-black fs-5 me-1">
                                        Exp : {{$data->experience}}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td class="cart__table--body__list" style="width: 100px">
                        {{ date('d-m-Y', strtotime($data->created_at)) }}
                    </td>
                    <td class="cart__table--body__list">
                        {{Hpx::maxChar($data->skills,30)}}
                    </td>
                    <td class="cart__table--body__list">
                        {{$data->mobile}}
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


