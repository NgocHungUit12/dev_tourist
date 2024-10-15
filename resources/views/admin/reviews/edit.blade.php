@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit</h1>
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
                <form action="{{ route('admin.reviews.update', $review) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="status">Permission</label>
                        <select name="status" class="form-control" >
                           <option value="active">Active</option>
                           <option value="hidden">Hidden</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection