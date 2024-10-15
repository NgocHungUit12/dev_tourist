@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chi tiết đơn đặt tour</h1>
            {{-- <a href="" class="btn btn-primary btn-sm shadow-sm">Add User  <i class="fa fa-plus"> </i></a> --}}
    </div>

        <div class="card-body">

            @if(session('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <div style="font-size: 20px;"><strong>Mã đơn: </strong>{{$order->order_number}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Tên tour: </strong>{{$order->tour->name}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Tổng tiền: </strong>{{number_format($order->total_amount,00)}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Số lượng người lớn: </strong>{{$order->quantity_adult}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Số lượng trẻ em từ 6 đến 11 tuổi: </strong>{{$order->quantity_child_6_11}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Số lượng trẻ em từ 2 đến 6 tuổi: </strong>{{$order->quantity_child_2_6}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Số lượng trẻ em dưới 2 tuổi: </strong>{{$order->quantity_free}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Phương thức thanh toán: </strong>{{$order->payment_method}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Trạng thái thanh toán: </strong>{{$order->payment_status}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Trạng thái đơn đặt: </strong>{{$order->status}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Tên người đặt: </strong>{{$order->name}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Email: </strong>{{$order->email}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Số điện thoại: </strong>{{$order->phone}}</div>
                <hr>
                <div style="font-size: 20px;"><strong>Địa chỉ: </strong>{{$order->address}}</div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection
