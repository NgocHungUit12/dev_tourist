@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật ngày khởi hành</h1>
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
                <form action="{{ route('admin.tours.departures.update', [$tour,$departure]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="departure_day">Ngày khởi hành</label>
                        <input type="date" class="form-control" id="departure_day" name="departure_day" value="{{ $departure->departure_day }}" />
                    </div>
                    <div class="form-group">
                        <label for="adult">Giá tour cho người lớn</label>
                        <input type="number" class="form-control" id="adult" name="adult" value="{{ $departure->adult }}" />
                    </div>
                    <div class="form-group">
                        <label for="children_6_11">Giá tour cho trẻ em 6 tới 11 tuổi</label>
                        <input type="number" class="form-control" id="children_6_11" name="children_6_11" value="{{ $departure->children_6_11 }}" />
                    </div>
                    <div class="form-group">
                        <label for="children_6">Giá tour cho trẻ em dưới 6 tuổi</label>
                        <input type="number" class="form-control" id="children_6" name="children_6" value="{{ $departure->children_6 }}" />
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng khách</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $departure->quantity }}" />
                    </div>
                    <input type="hidden" name="tour_id" value="{{$tour->id}}">
                    <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection