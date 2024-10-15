@extends('auth.layout')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Acount Management</h1>
            {{-- <a href="" class="btn btn-primary btn-sm shadow-sm">Add User  <i class="fa fa-plus"> </i></a> --}}
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-4 mb-4">
            <a href="{{route('auth.order')}}">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Order</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_order}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
    </div>
</div>
@endsection