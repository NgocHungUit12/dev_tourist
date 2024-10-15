@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tổng quan</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{route('admin.categories.index')}}">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Category</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_categories}} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{route('admin.tours.index')}}">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Tour</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_tour}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{route('admin.posts.index')}}">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Post
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{$count_post}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-pen fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{route('admin.users.index')}}">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_user}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
    
    </div>

</div>
@endsection
