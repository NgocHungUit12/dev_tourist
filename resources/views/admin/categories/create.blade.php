@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm danh mục</h1>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Tên danh mục</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea name="description" id="description" class="form-control" value="{{ old('description') }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Thêm</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection