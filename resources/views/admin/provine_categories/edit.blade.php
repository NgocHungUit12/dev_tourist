@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật danh mục tỉnh</h1>
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
                <form action="{{ route('admin.provine_categories.update', $provine_category) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="region_category_id">Danh mục</label>
                        <select name="region_category_id" id="region_category_id" class="form-control">
                            @foreach($region_categories as $region_category)
                                <option value="{{ $region_category->id }}">{{ $region_category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Tên</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $provine_category->title }}" />
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea type="text" class="form-control" id="description" name="description" value="{{  $provine_category->description }}" >{{ $provine_category->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection