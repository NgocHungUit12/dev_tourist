@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật danh mục tour</h1>
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
                <form action="{{ route('admin.region_categories.update', $region_category) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="category_id">Danh mục</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Tên</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $region_category->title }}" />
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea type="text" class="form-control" id="description" name="description" value="{{  $region_category->description }}" >{{ $region_category->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection