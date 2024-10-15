@extends('admin.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật tour - {{ $tour->name }}</h1>
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
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('admin.tours.update', $tour ) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Danh mục tỉnh</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach($provine_categories as $provine_category)
                                    <option value="{{ $provine_category->id }}" @if($provine_category->id ==  $tour->provine_category_id ) selected @endif>{{ $provine_category->title }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $tour->name }}" />
                        </div>
                        <div class="form-group">
                            <label for="location">Địa điểm du lịch</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $tour->location }}" />
                        </div>
                        <div class="form-group">
                            <label for="location_start">Nơi khởi hành</label>
                            <input type="text" class="form-control" id="location_start" name="location_start" value="{{ $tour->location_start }}" />
                        </div>
                        <div class="form-group">
                            <label for="duration">Thời gian</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ $tour->duration }}" />
                        </div>
                        <div class="form-group">
                            <label for="vehical">Phương tiện</label>
                            <input type="text" class="form-control" id="vehical" name="vehical" value="{{ $tour->vehical }}" />
                        </div>
                        <div class="form-group">
                            <label for="hotel">Khách sạn</label>
                            <input type="text" class="form-control" id="hotel" name="hotel" value="{{ $tour->hotel }}" />
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" class="form-control">{{ $tour->description }}</textarea>
                        </div>
                    <button type="submit" class="btn btn-primary btn-block">Lưu lại</button>
                    </form>
                </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow">

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
                                <th>Hình Ảnh</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tour->galleries as $gallery)
                            <tr>
                                <td>{{ $gallery->id }}</td>
                                <td>
                                    <img width="100" src="/backend/img/{{ $gallery->path }}" >
                                </td>
                                <td>
                                    <a href="{{ route('admin.tours.galleries.edit', [$tour,$gallery]) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form  class="d-inline" action="{{ route('admin.tours.galleries.destroy',  [$tour,$gallery]) }}" method="POST">
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
                                <td colspan="7" class="text-center">No Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.tours.galleries.store', $tour ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="path">Thêm ảnh</label>
                        <input type="file" class="form-control" id="path" name="path" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Lưu ảnh</button>
                </form>
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
                                <th>Ngày khỏi hành</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tour->departures as $departure)
                            <tr>
                                <td>{{ $departure->id }}</td>
                                <td>{{ $departure->departure_day }}</td>
                                <td>
                                    <a href="{{ route('admin.tours.departures.edit', [$tour,$departure]) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form  class="d-inline" action="{{ route('admin.tours.galleries.destroy',  [$tour,$departure]) }}" method="POST">
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
                                <td colspan="7" class="text-center">No Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.tours.departures.store', $tour ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="departure_day">Ngày khởi hành</label>
                        <input type="date" class="form-control" id="departure_day" name="departure_day" />
                    </div>
                    <div class="form-group">
                        <label for="adult">Giá người lớn</label>
                        <input type="number" class="form-control" id="adult" name="adult" placeholder="Nhập giá tour cho người lớn" />
                    </div>
                    <div class="form-group">
                        <label for="children_6_11">Giá trẻ em 6 - 11 tuổi</label>
                        <input type="number" class="form-control" id="children_6_11" name="children_6_11" placeholder="Nhập giá tour cho trẻ em từ 6 đến 11 tuổi"/>
                    </div>
                    <div class="form-group">
                        <label for="children_6">Giá trẻ em dưới 6 tuổi</label>
                        <input type="number" class="form-control" id="children_6" name="children_6" placeholder="Nhập giá tour cho trẻ em dưới 6 tuổi"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng khách"/>
                    </div>
                    <input type="hidden" name="tour_id" value="{{$tour->id}}">
                    <button type="submit" class="btn btn-primary btn-block">Thêm ngày khởi hành</button>
                </form>
            </div>
        </div>
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