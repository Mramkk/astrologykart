@extends('admin.layouts.admin_layout')
@section('title', env('APP_NAME'))
@section('style')
    <style>
        table .cart__table--header__list {
            color: #3d3d3d;

        }

        table .account__table--body__child--items {
            padding: 0.7rem 0rem;
        }

        .pay_failed {
            font-weight: 600;
            text-transform: capitalize;
            color: #e40202;
        }

        .pay_created {
            font-weight: 600;
            text-transform: capitalize;
            color: #9e8f09;
        }

        .pay_captured {
            font-weight: 600;
            text-transform: capitalize;
            color: #19831e;
        }
    </style>
@endsection

@section('main-content')
    <div class="admin-container">
        @php
            $tbx['tb'] = 1;
            $tbx['title'] = 'All Transactions';
            $tbx['search-bar'] = true;
            $route_name = 'payment';
        @endphp
        <div class="bg-light">
            @include('admin.includes.title-bar')
            <div class="mb-4 px-4 py-3 border-top" style="margin-top: -20px;">
                <div class="row">
                    <div class="col-md-4">
                        <b>Payment Filter : </b>
                    </div>
                    <div class="col-md-8 text-end">
                        <button class="btn btn-primary fs-5" id="refresh__btn" type="button" onclick="refresh_payments()"
                            data-refresh="x">
                            Refresh Payments
                            {!! Hpx::spinner() !!}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="cart__table">
            <table class="cart__table--inner">
                <thead class="cart__table--header">
                    <tr class="cart__table--header__items">
                        <th class="cart__table--header__list">Description</th>
                        <th class="cart__table--header__list">Datetime</th>
                        <th class="cart__table--header__list">Amount</th>
                        <th class="cart__table--header__list">Transaction ID</th>
                        <th class="cart__table--header__list">Status</th>
                        <th class="cart__table--header__list text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="cart__table--body" id="slider-list">
                    @foreach ($data_list as $data)
                        <tr class="cart__table--body__items">
                            <td class="account__table--body__child--items">{{ $data->description ?? 'Payment Created' }}
                            </td>
                            <!--<td class="account__table--body__child--items">-->
                            <!--    {{ date('d M Y h:i A', strtotime($data->created_at)) }}-->
                            <!--</td>-->
                            <td class="account__table--body__child--items">
                                {{ date('d-m-Y h:i A', strtotime($data->created_at)) }}
                            </td>
                            <td class="account__table--body__child--items"><b>{{ $data->amount }}</b></td>
                            <td class="account__table--body__child--items">{{ $data->payment_id ?? '##########' }}</td>
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
                                {{ $pay_status }}
                            </td>
                            <td class="account__table--body__child--items text-right">
                                <a class="btn btn-sm fs-4 px-3 btn-outline-secondary view__btn" data-id="{{$data->id}}" data-open="view-payment"
                                    href="#">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="view-payment" data-animation="slideInUp">
        <div class="modal-dialog quickview__main--wrapper" style="max-width: 500px;">
            <header class="modal-header quickview__header">
                <button class="close-modal quickview__close--btn" aria-label="close modal" data-close="">✕ </button>
            </header>
            <form action="http://localhost/astrologykart/account/user/ajax" enctype="multipart/form-data"
                id="user-data-form">
                <input type="hidden" name="action" value="UPDATE_USER_DETAILS">
                <div>
                    <div class="account__login--header mb-25">
                        <h2 class="account__login--header__title h4 mb-10">Payment Details</h2>
                    </div>
                    <div class="row" id="payment__details">

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function refresh_payments() {
            var x = new Ajx;
            x.actionUrl("{{ route('payment.store') }}");
            x.passData('action', 'REFRESH_PAYMENTS');
            x.ajxLoader('#refresh__btn .loaderx');
            x.disableBtn('#refresh__btn');
            x.globalAlert(false);
            x.start(function(response) {
                if (response.status == true) {
                    if (response.next_refresh != false) {
                        $refresh_id = $('#refresh__btn').attr('data-refresh');
                        if (response.next_refresh != $refresh_id) {
                            $('#refresh__btn').attr('data-refresh', response.next_refresh);
                            refresh_payments();
                        } else {
                            location.reload();
                        }
                    } else {
                        location.reload();
                    }
                }
            });
        }

        $(document).ready(function() {
            $('.view__btn').click(function(e) {
                $('#payment__details').html('');
                var x = new Ajx;
                x.actionUrl("{{ route('payment.store') }}");
                x.passData('action', 'PAYMENT_DETAILS');
                x.passData('id', $(this).attr('data-id'));
                x.globalAlert(false);
                x.start(function(response) {
                    $('#payment__details').html(response.html);
                });
            });
        });
    </script>
@endsection
