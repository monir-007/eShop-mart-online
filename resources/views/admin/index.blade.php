@extends('admin.layouts.app')
@section('admin-index')
    @php
        $date = date('d-m-y');
        $today = \App\Models\Order::where('order_date', $date)->sum('amount');
        $month = date('F');
        $monthly = \App\Models\Order::where('order_month', $month)->sum('amount');
        $year = date('Y');
        $yearly = \App\Models\Order::where('order_year', $year)->sum('amount');

    $pendingOrder = \App\Models\Order::where('status','pending')->get();
    @endphp

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Today Sale</p>
                                <h3 class="text-white mb-0 font-weight-500">${{$today}} <small class="text-success"><i
                                            class="fa fa-caret-up"></i> USD</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Monthly Sold </p>
                                <h3 class="text-white mb-0 font-weight-500">${{$monthly}} <small class="text-success"><i
                                            class="fa fa-caret-up"></i> USD</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Yearly Sale</p>
                                <h3 class="text-white mb-0 font-weight-500">${{$yearly}} <small class="text-danger"><i
                                            class="fa fa-caret-down"></i> USD</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
                                <h3 class="text-white mb-0 font-weight-500">{{count($pendingOrder )}} <small
                                        class="text-danger"><i
                                            class="fa fa-caret-up"></i> order</small></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                New Orders
                            </h4>
                        </div>
                        @php
                            $orders = \App\Models\Order::where('status','pending')->get();
                        @endphp
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <thead>
                                    <tr class="text-uppercase bg-lightest">
                                        <th style="min-width: 100px"><span class="text-white">Date</span></th>
                                        <th style="min-width: 140px"><span class="text-fade">Invoice</span></th>
                                        <th style="min-width: 120px"><span class="text-fade">Amount</span></th>
                                        <th style="min-width: 150px"><span class="text-fade">Payment</span></th>
                                        <th style="min-width: 130px"><span class="text-fade">status</span></th>
                                        <th style="min-width: 140px"><span class="text-fade">Process</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $item)
                                        <tr>
                                            <td>
                                                <span class="text-white font-weight-600 d-block font-size-16">
													{{\Carbon\Carbon::parse($item->order_date)->diffForHumans()}}
												</span>
                                            </td>
                                            <td>
                                            <span class="text-white font-weight-600 d-block font-size-16">
													{{$item->invoice_no}}
												</span>
                                            </td>
                                            <td>

                                            <span class="text-white font-weight-600 d-block font-size-16">
													${{$item->amount}}

												</span>
                                            </td>
                                            <td>

                                            <span class="text-white font-weight-600 d-block font-size-16">
													{{$item->payment_method}}
												</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-primary-light badge-lg">{{$item->status}}</span>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{route('pending.orders.detail',$item->id)}}"
                                                   class="waves-effect waves-light btn btn-info btn-circle mx-5"
                                                   data-toggle="tooltip" data-original-title="View Order Details"><span
                                                        class="mdi mdi-bookmark-plus"></span></a>

                                                @if($item->status === 'pending')
                                                    <a href="{{route('pending.order.confirmed.index', $item->id)}}"
                                                       class="waves-effect waves-light btn btn-warning btn-circle mx-5"
                                                       data-toggle="tooltip" data-original-title="Confirm Order"
                                                       id="confirm"><span
                                                            class="mdi mdi-arrow-right"></span></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
