@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Payment History</title>
    <link rel="stylesheet" href="{{ asset('assets/web/css/user.css') }}">
@endsection

@section('style')
    <style>
        .pay_failed {
            font-weight: 600;
            text-transform: capitalize;
            color: #e40202;
        }

        .pay_created {
            font-weight: 600;
            text-transform: capitalize;
            color: #af9f0a;
        }

        .pay_captured {
            font-weight: 600;
            text-transform: capitalize;
            color: #19831e;
        }
    </style>
@endsection

@section('main-content')
    <div class="main-container pt-5">
        <div class="container">
            @include('web.includes.user.page-title', ['page_title' => 'Payment History','back_btn'=>'./'])
            <table class="account__table bg-white">
                <thead class="account__table--header">
                    <tr class="account__table--header__child">
                        <th class="account__table--header__child--items">Description</th>
                        <th class="account__table--header__child--items">Datetime</th>
                        <th class="account__table--header__child--items">Amount</th>
                        <th class="account__table--header__child--items">Transaction ID</th>
                        <th class="account__table--header__child--items">Status</th>
                    </tr>
                </thead>
                <tbody class="account__table--body mobile__none">
                    @foreach ($payments as $data)
                        <tr class="account__table--body__child">
                            <td class="account__table--body__child--items">{{ $data->description ?? '----------------' }}</td>
                            <td class="account__table--body__child--items">{{ date('d M Y h:i:s A',strtotime($data->created_at)) }}</td>
                            <td class="account__table--body__child--items"><b>{{ $data->amount }}</b></td>
                            <td class="account__table--body__child--items">{{ $data->payment_id ?? '##########'}}</td>
                            @php
                                $pay_status = 'Failed';
                                if ($data->status == 'created') {
                                    $pay_status = 'Pending';
                                }
                                if ($data->status == 'captured') {
                                    $pay_status = 'Completed';
                                }
                            @endphp
                            <td class="account__table--body__child--items pay_failed pay_{{ $data->status }}">
                                {{ $pay_status }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="account__table--body mobile__block">
                    @foreach ($payments as $data)
                    <tr class="account__table--body__child">
                        <td class="account__table--body__child--items">
                            <strong>Description</strong>
                            <span>{{ $data->description }}</span>
                        </td>
                        <td class="account__table--body__child--items">
                            <strong>Datetime</strong>
                            <span>{{ Hpx::mydate_month($data->created_at,'date-time') }}</span>
                        </td>
                        <td class="account__table--body__child--items">
                            <strong>Amount</strong>
                            <span>{{ $data->amount }}</span>
                        </td>
                        <td class="account__table--body__child--items">
                            <strong>Transaction ID</strong>
                            <span>{{ $data->payment_id }}</span>
                        </td>
                        @php
                            $pay_status = 'Failed';
                            if ($data->status == 'created') {
                                $pay_status = 'Pending';
                            }
                            if ($data->status == 'captured') {
                                $pay_status = 'Completed';
                            }
                        @endphp
                        <td class="account__table--body__child--items">
                            <strong>Status</strong>
                            <span>{{ $pay_status }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br><br><br>
    </div>
@endsection
