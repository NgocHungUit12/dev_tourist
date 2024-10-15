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

      <section id="collection-page" style="padding-top: 20px;">
        <div class="container">
    
            <div class="row">

                <div class="col-sm-8 col-sm-push-4">
                    <div class="seo-text"><h2 style="text-align:justify"><strong>{{$category->title}}</strong></h2>
                        <p style="text-align:justify">{{$category->description}}</p>
                    </div>
                    <br>
                    @foreach ($category->region_categories as $region)
                    @foreach ($region->provine_categories as $provine)
                    @foreach ($provine->tours as $tour)
                      <div class="collection-wrap" id="list_tour">
                          <div class="thumbnail block-tour horizontal shadow cb">
                              <div class="img-tour">
                                  <a href="{{ route('detail', $tour->departures->first()) }}" title="{{$tour->name}}" title="">
                                      <img class="img-rounded" src="/backend/img/{{ $tour->galleries->first()->path }}" alt="">
                                  </a>
                                      {{-- <div class="label-hot d-none"><img src="/img/Home/hot.png" alt="Hot tour"></div> --}}
          
                                      <div class="label-start-localtion"><i class="fa fa-map-marker" aria-hidden="true"></i> KH Từ: {{$tour->location_start}}</div>
                              </div>
                                      
                              <div class="info-tour">
                                  <div class="caption">
                                      <a class="title-tour" href="{{ route('detail', $tour->departures->first()) }}" title="{{$tour->name}}">{{$tour->name}}</a>
                                      
                                      <p><i class="fa fa-clock-o"></i>
                                          <span>{{ optional($tour->departures->first())->departure_day }}</span></p>             
                                      
                                      <p>
                                          <i class="fa fa-users" aria-hidden="true"></i>
                                          <span>Số chỗ còn nhận: {{ optional($tour->departures->first())->quantity}}</span>
                                      </p>
                                      <p>
                                          <i class="fa fa-calendar"></i>
                                          <a href="{{route('other_day', $tour)}}">
                                              <span>Xem ngày khác</span>
                                          </a>
                                      </p>
                                  </div>
                                  <div class="bottom ">
                                      <i class="fa fa-money"></i>
                                      <span>{{ number_format(optional($tour->departures->first())->adult, 0) }} vnđ</span>
                                      <a href="{{ route('checkout', $tour->departures->first()) }}" class="text-center btn btn-second">ĐẶT NGAY</a>
                                  </div>
                              </div>
                          </div>              
                      </div>
                      @endforeach
                      @endforeach
                    @endforeach
                </div>

                <div class="col-sm-4 col-sm-pull-8">
                    <div class="panel"></div>
                    <div class="panel">
                        <div class="panel-heading">
                            <i class="fa fa-building-o"></i> LIÊN HỆ
                        </div>
                        <div class="panel-footer">

                            <strong>Trụ sở: </strong> KTX A, 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ
                            <br>
                            <strong>Điện thoại: </strong>
                            <a href="#" title="0123456789">0123456789</a>
                            <br>
                            <strong>Fax: </strong> 0123456789
                            <br>
                            <strong>Email: </strong> <a href="#">anhb1910030@student.ctu.edu.vn</a>
                            <br>
                            <strong>Tổng đài: </strong> <a class="hotline" href="#">1900 9999</a>
                            <div class="social-media">
                            <h4>KẾT NỐI CHÚNG TÔI <a href="#" target="_blank"><i class="fa fa-facebook"></i></a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
      </section>
      
    </main>
@endsection