@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('head')
@endsection

@section('main-content')

    <div class="admin-container">
        @php
            $tbx['tb'] = 1;
            $tbx['title'] = 'User Query';
            $tbx['search-bar'] = true;
            $route_name = 'customer';
            $image_dir = 'assets/img/userprofile/';
        @endphp

        {{-- @include('admin.includes.title-bar') --}}

        @if (!empty($tbx['tb']))
            <div class="row bg__gray--color py-4 pb-3 rounded mx-0 mb-4">
                <div class="col-5">
                    <h2 class="fs-2">
                        {!! !empty($tbx['back-btn'])
                            ? '<a href="' .
                                $tbx['back-btn'] .
                                '" class="fs-1 me-2" style="padding: 0px 6px;"><i class="icofont-arrow-left"></i></a>'
                            : null !!}
                        {{ $tbx['title'] ?? null }}
                    </h2>
                </div>
                <div class="col-7">
                    @if (isset($tbx['btn-name']))
                        <a class="btn btn-success float-end fs-4 px-4" href="{{ $tbx['btn-link'] }}">
                            {{ $tbx['btn-name'] }}
                        </a>
                    @endif
                    <a class="offcanvas__stikcy--toolbar__btn search__open--btn d-lg-none float-end me-3"
                        href="javascript:void(0)" data-offcanvas="">
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                    fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="32" d="M338.29 338.29L448 448"></path>
                            </svg>
                        </span>
                    </a>


                    @if (isset($tbx['search-bar']))
                        <form class="product__view--search__form float-end d-none d-lg-flex me-4"
                            action="{{ url()->current() }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control fs-4" placeholder="Search here . . . "
                                    name="q" value="@if (!empty(request('q'))) {{ request('q') }} @endif"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <button type="submit" class="btn btn-primary px-4 fs-4" type="button" id="button-addon2">
                                    <i class="icofont-search"></i>
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
                <div class="col-5">
                    <a href="#" class="btn btn-success px-4 fs-4"  id="button-addon2">
                        <i class="icofont-file-spreadsheet"></i>
                    </a>
                </div>
            </div>
        @endif

        <div class="cart__table">
            <table class="cart__table--inner">
                @include('admin.includes.table_headings')

                {!! table_headings(['Full Name', 'Date', 'Mobile', 'Email', 'Message']) !!}
                <tbody class="cart__table--body">
                    @foreach ($data_list as $data)
                        <tr class="cart__table--body__items">
                            <td class="cart__table--body__list">
                                <h3 class="cart__content--title text-capitalize fw-bold">
                                    {{ $data->fullname != " " ? strtolower($data->fullname) : 'User' }}
                                </h3>
                            </td>
                            <td class="cart__table--body__list">
                                {{ date('d-m-Y h:m A', strtotime($data->created_at)) ?? 'N/A' }}
                            </td>
                            <td class="cart__table--body__list">
                                {{ $data->mobile }}
                            </td>
                            <td class="cart__table--body__list">
                                {{ $data->email ?? 'N/A' }}
                            </td>
                            <td class="cart__table--body__list">
                                {{ $data->message ?? 'N/A' }}
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
