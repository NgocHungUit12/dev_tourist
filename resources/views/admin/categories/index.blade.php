@extends('admin.layout')

@section('content')

<div class="container-fluid">
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control mb-2" placeholder="Tìm kiếm danh mục...">
        
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh mục tour</h1>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm shadow-sm">Thêm danh mục  <i class="fa fa-plus"> </i></a>
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
                <table id="productList" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{  $category->description }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form  class="d-inline" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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

</div>

@endsection
@section('scripts')
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        var rows = document.querySelectorAll('#productList tbody tr');

        rows.forEach(function(row) {
            var title = row.cells[1].textContent.toLowerCase(); 
            if (title.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection