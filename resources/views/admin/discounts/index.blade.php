@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mã giảm giá</h1>
            <a href="{{ route('admin.discounts.create') }}" class="btn btn-primary btn-sm shadow-sm">Thêm mã giảm  <i class="fa fa-plus"> </i></a>
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
                            <th>Mã</th>
                            <th>Loại giảm</th>
                            <th>Giá trị</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($discounts as $discount)
                        <tr>
                            <td>{{ $discount->id }}</td>
                            <td>{{ $discount->code }}</td>
                            @if($discount->type === 'percent')
                                <td>% phần trăm</td>
                            @else
                                <td>$ giá tiền</td>
                            @endif
                            <td>{{  $discount->value }}</td>
                            <td>
                                <a href="{{ route('admin.discounts.edit', $discount) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form  class="d-inline" action="{{ route('admin.discounts.destroy', $discount) }}" method="POST">
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
                            <td colspan="7" class="text-center">Không có danh mục nào được tìm thấy</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection