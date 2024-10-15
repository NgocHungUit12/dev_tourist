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
                <form action="{{ route('admin.discounts.update', $discount) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="code">Tên</label>
                        <input type="text" class="form-control" id="code" name="code" value="{{ $discount->code }}" />
                    </div>
                    <div class="form-group">
                        <label for="type">Loại mã giảm giá</label>
                        <select name="type" id="type" class="form-control"> 
                            <option value="percent">% phần trăm</option>
                            <option value="vnđ">$ giá tiền</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="value">Mô tả</label>
                        <textarea type="text" class="form-control" id="value" name="value" value="{{  $discount->value }}" >{{ $discount->value }}</textarea>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection