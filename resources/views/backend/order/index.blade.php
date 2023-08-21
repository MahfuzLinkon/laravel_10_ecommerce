@extends('backend.layout.master')
@section('title', 'Manage order')
@section('content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Manage Order</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Order List</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th style="width: 1%">SN</th>
                        <th style="width: 8%">Order ID</th>
                        <th style="">Customer Name</th>
                        <th style="">Order Total</th>
                        <th style="">Date</th>
                        <th style="">Shipping Address</th>
                        <th style="width: 4%">Status</th>
                        <th style="width: 13%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="center">{{ $order->id }}</td>
                            <td class="center">{{ $order->user->name }}</td>
                            <td class="center">{{ $order->total }} &#2547;</td>
                            <td class="center">{{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y, h:i A') }}</td>
                            <td class="center">{{ $order->shipping->address  }}</td>
                            <td class="center">
                                <span class="label label-{{ $order->status == 1 ? 'success' : 'warning' }}">{{ $order->status == 1 ? 'Active' : 'Deactivate' }}</span>
                            </td>
                            <td class="center">
                                <div style="text-align: center">
{{--                                    <a href="{{ route('products.status',$order->id) }}" class="btn btn-{{ $order->status == 1 ? 'warning' : 'success' }}"  title="{{ $order->status == 1 ? 'Make Deactivate' : 'Make Activate' }}">--}}
{{--                                        <i class="halflings-icon white thumbs-{{ $order->status == 1 ? 'down' : 'up' }}" ></i>--}}
{{--                                    </a>--}}
                                    <a class="btn btn-primary" href="{{ route('order.details', $order->id) }}" title="View Details">
                                        <i class="halflings-icon white zoom-in" ></i>
                                    </a>
                                    <form onsubmit="return confirm('Confirm Delete ?')" action="{{ route('products.destroy', $order->id) }}"  style="display: inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" title="Delete Category" class="btn btn-danger"><i class="halflings-icon white trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection
