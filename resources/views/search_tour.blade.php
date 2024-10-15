@extends('layouts.app')

@section('content')
    <main>
      <!--=============== HOME ===============-->
      <section
        class="hero"
        id="hero"
      
      >
        <div
          class="hero-content h-100 d-flex justify-content-center align-items-center flex-column"
        >
          <h1 class="text-center text-white display-4">
            
          </h1>
          <a href="#package" class="btn btn-hero mt-5"><strong>Book Now</strong></a>

        </div>
        <div class="btn-hero1">
          <form action="{{ route('search_tour') }}" method="GET">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <label>Xuất phát từ</label>
                <select name="location_start" class="form-select">
                    <option value="">Chọn nơi khởi hành</option>
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="Hạ Long">Hạ Long</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                    <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                    <option value="Cần Thơ">Cần Thơ</option>
                </select>
                
              </div>
              <div class="col-md-3">
                <label>Ngày khởi hành</label>
                <input type="date" name="date_start"  class="form-control">
              </div>
              <div class="col-md-3">
                <label>Tìm theo từ khóa</label>
                <input type="text" name="name" placeholder="Nhập thông tin cần tìm" class="form-control">
              </div>
              <div class="col-md-1">
                <br>
                <button type="submit" class="btn btn-primary">Tìm tour</button>
              </div>
            </div>
          </form>
        </div>
      </section>
      

      <!--=============== Package Travel ===============-->

      <section class="container featured-tours" id="promotion-tour">
        <h2 class="section-title">Tất cả tour</h2>
        <div class="row">
          @foreach($departures as $departure)
          
            <div class="col-md-4 col-sm-6 col-xs-12 elememt">
              <div class="thumbnail block-tour shadow" style="height: 507px; padding: 0px;">
                <a href="{{ route('detail', $departure->id) }}" title="{{$departure->tour->name}}">
                  <img style="height: 252px;" class="img-rounded" src="/backend/img/{{ $departure->tour->galleries->first()->path }}" alt="{{$departure->tour->name}}">
                </a>
                <div class="caption" style="padding: 15px;">
                  <a class="title-tour" href="{{ route('detail', $departure->id) }}">
                    {{$departure->tour->name}}
                  </a>
                  <div class="location" style="margin-bottom: 10px;">
                    <i class="fa fa-flag" style="color: black;"></i>
                    <span style="color: black;">{{$departure->tour->location_start}} </span>
                  </div>
                  <i class="fa fa-clock-o" style="color: black;"></i>
                  <span style="color: black;">{{ $departure->departure_day }}</span>
                  <a class="fright" href="{{route('other_day', $departure->tour)}}" >Ngày khác</a>
                </div> 
                <div class="bottom " bis_skin_checked="1">
                  <i class="fa fa-money" style="color: black;"></i>
                  <span>{{ number_format(optional($departure)->adult, 0) }} vnđ</span>
                  <a href="{{ route('checkout', $departure) }}" class="text-center btn btn-second" style="font-size: 18px;">ĐẶT NGAY</a>
                  </div>
              </div>
            </div>
          @endforeach 
        </div>
      </section>
      
    </main>
@endsection