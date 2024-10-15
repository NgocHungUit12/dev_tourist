@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order</h1>
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
                <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th>Người lớn</th>
                            <th>Trẻ em 6 - 11 tuổi</th>
                            <th>Trẻ em 2 - 6 tuổi</th>
                            <th>Trẻ em dưới 2 tuổi</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name}}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->quantity_adult }}</td>
                            <td>{{ $order->quantity_child_6_11 }}</td>
                            <td>{{ $order->quantity_child_2_6 }}</td>
                            <td>{{ $order->quantity_free }}</td>
                            <td>{{ number_format($order->total_amount)}} VNĐ</td>
                            <td>
                                @if ($order->payment_method == 'cod')
                                    <span>Cash</span>
                                @else
                                    <span>Online</span>
                                @endif
                            </td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form  class="d-inline" action="{{ route('admin.orders.destroy', $order) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onClick="return confirm('Are you sure !')" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection