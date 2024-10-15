@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm tour</h1>
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
                <form action="{{ route('admin.tours.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="provine_category_id">Danh mục tỉnh</label>
                        <select name="provine_category_id" class="form-control" >
                            @foreach($provine_categories as $provine_category)
                                <option value="{{ $provine_category->id }}">{{ $provine_category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group">
                        <label for="location">Địa điểm du lịch</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" />
                    </div>
                    <div class="form-group">
                        <label for="location_start">Nơi khởi hành</label>
                        <input type="text" class="form-control" id="location_start" name="location_start" value="{{ old('location_start') }}" />
                    </div>
                    <div class="form-group">
                        <label for="duration">Thời gian</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" />
                    </div>
                    <div class="form-group">
                        <label for="vehical">Phương tiện</label>
                        <input type="text" class="form-control" id="vehical" name="vehical" value="{{ old('vehical') }}" />
                    </div>
                    <div class="form-group">
                        <label for="hotel">Khách sạn</label>
                        <input type="text" class="form-control" id="hotel" name="hotel" value="{{ old('hotel') }}" />
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection
@push('script-alt')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush