@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh mục tỉnh</h1>
            <a href="{{ route('admin.provine_categories.create') }}" class="btn btn-primary btn-sm shadow-sm">Thêm danh mục  <i class="fa fa-plus"> </i></a>
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
                            <th>Mô tả</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($provine_categories as $provine_category)
                        <tr>
                            <td>{{ $provine_category->id }}</td>
                            <td>{{ $provine_category->title }}</td>
                            <td>{{  $provine_category->description }}</td>
                            <td>
                                <a href="{{ route('admin.provine_categories.edit', $provine_category) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form  class="d-inline" action="{{ route('admin.provine_categories.destroy', $provine_category) }}" method="POST">
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