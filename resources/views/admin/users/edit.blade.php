@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật</h1>
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
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Họ Tên</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" />
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}" />
                    </div>
                    <div class="form-group">
                        <label for="sex">Giới tính</label>
                        <select class="form-control" name="sex" id="sex">
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Ngày sinh</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" />
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" />
                    </div>
                    <div class="form-group">
                        <label for="role">Quyền</label>
                        <select name="role" class="form-control" >
                           <option value="0">Quản trị viên</option>
                           <option value="1">Nhân viên</option>
                           <option value="2">Khách hàng</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection