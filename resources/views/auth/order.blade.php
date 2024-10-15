@extends('auth.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>
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
                            <th>Code</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
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
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->user->name}} </td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                          
                            <td>{{ number_format($order->total_amount)}} VNĐ</td>
                            <td>
                                @if ($order->payment_method == 'cod')
                                    <span>Cash</span>
                                @else
                                    <span>Online</span>
                                @endif
                            </td>
                            @if ($order->status == 'book')
                                <td>{{ $order->status }}</td>
                                <td>
                                    <form action="{{ route('orders.update', $order) }}" method="POST">
                                        @Method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="status" value="cancel">
                                        </div>
                                        <button value="" type="submit" class="btn btn-danger btn-block">Cancel</button>
                                    </form>
                                   
                                </td>
                                @else
                                <td>{{ $order->status }}</td>
                                <td></td>
                                @endif
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
