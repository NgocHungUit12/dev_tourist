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

        <!--=============== Why us ===============-->
        <div id="travle">
        <!--=============== Tours ===============-->
        
          <div id="travel-bk">
            <section class="container featured-tours" id="promotion-tour">
              <h2 class="section-title">Du Lịch Trong Nước</h2>
              {{-- <hr width="40" class="text-center" /> --}}
              <div class="row">
                @php $tourCount = 0; @endphp
                @foreach($region1s as $regionCategory)
                  @foreach($regionCategory->provine_categories as $provinceCategory)
                    @foreach($provinceCategory->tours as $tour)
                      @if($tourCount < 6)
                        <div class="col-md-4 col-sm-6 col-xs-12 elememt">
                          <div class="thumbnail block-tour shadow" style="height: 507px; padding: 0px;">
                            <a href="{{ route('detail', $tour->departures->first()) }}" title="{{$tour->name}}">
                              <img style="height: 252px;" class="img-rounded" src="/backend/img/{{ $tour->galleries->first()->path }}" alt="{{$tour->name}}">
                            </a>
                            <div class="caption" style="padding: 15px;">
                              <div class="label-hot">
                                <img src="https://benthanhtourist.com/img/Home/hot.png" alt="">
                              </div>
                              <a class="title-tour" href="{{ route('detail', $tour->departures->first()) }}">
                                {{$tour->name}}
                              </a>
                              <div class="location" style="margin-bottom: 10px;">
                                <i class="fa fa-flag" style="color: black;"></i>
                                <span style="color: black;">{{$tour->location_start}} </span>
                              </div>
                              <i class="fa fa-clock-o" style="color: black;"></i>
                              <span style="color: black;">{{ optional($tour->departures->first())->departure_day }}</span>
                              <a class="fright" href="{{route('other_day', $tour)}}" >Ngày khác</a>
                            </div> 
                            <div class="bottom " bis_skin_checked="1">
                              <i class="fa fa-money" style="color: black;"></i>
                              <span>{{ number_format(optional($tour->departures->first())->adult, 0) }} vnđ</span>
                              <a href="{{ route('checkout', $tour->departures->first()) }}" class="text-center btn btn-second" style="font-size: 18px;">ĐẶT NGAY</a>
                              </div>
                          </div>
                        </div>
                        @php $tourCount++; @endphp
                      @else
                        @break(3) {{-- Break out of all three foreach loops --}}
                      @endif
                    @endforeach
                    @if($tourCount >= 6)
                      @break {{-- Break out of the second foreach loop if we already have 6 tours --}}
                    @endif
                  @endforeach
                  @if($tourCount >= 6)
                    @break {{-- Break out of the first foreach loop if we already have 6 tours --}}
                  @endif
                @endforeach
              </div>
            </section>
          </div>
          <div id="travel-bk">
            <section class="container featured-tours" id="promotion-tour">
              <h2 class="section-title">Du Lịch Nước Ngoài</h2>
              {{-- <hr width="40" class="text-center" /> --}}
              <div class="row">
                @php $tourCount = 0; @endphp
                @foreach($region2s as $regionCategory)
                  @foreach($regionCategory->provine_categories as $provinceCategory)
                    @foreach($provinceCategory->tours as $tour)
                      @if($tourCount < 6)
                        <div class="col-md-4 col-sm-6 col-xs-12 elememt">
                          <div class="thumbnail block-tour shadow" style="height: 507px; padding: 0px;">
                            <a href="{{ route('detail', $tour->departures->first()) }}" title="{{$tour->name}}">
                              <img style="height: 252px;" class="img-rounded" src="/backend/img/{{ $tour->galleries->first()->path }}" alt="{{$tour->name}}">
                            </a>
                            <div class="caption" style="padding: 15px;">
                              <div class="label-hot">
                                <img src="https://benthanhtourist.com/img/Home/hot.png" alt="">
                              </div>
                              <a class="title-tour" href="{{ route('detail', $tour->departures->first()) }}">
                                {{$tour->name}}
                              </a>
                              <div class="location" style="margin-bottom: 10px;">
                                <i class="fa fa-flag" style="color: black;"></i>
                                <span style="color: black;">{{$tour->location_start}} </span>
                              </div>
                              <i class="fa fa-clock-o" style="color: black;"></i>
                              <span style="color: black;">{{ optional($tour->departures->first())->departure_day }}</span>
                              <a class="fright" href="{{route('other_day', $tour)}}" >Ngày khác</a>
                            </div> 
                            <div class="bottom " bis_skin_checked="1">
                              <i class="fa fa-money" style="color: black;"></i>
                              <span>{{ number_format(optional($tour->departures->first())->adult, 0) }} vnđ</span>
                              <a href="{{ route('checkout', $tour->departures->first()) }}" class="text-center btn btn-second" style="font-size: 18px;">ĐẶT NGAY</a>
                              </div>
                          </div>
                        </div>
                        @php $tourCount++; @endphp
                      @else
                        @break(3) {{-- Break out of all three foreach loops --}}
                      @endif
                    @endforeach
                    @if($tourCount >= 6)
                      @break {{-- Break out of the second foreach loop if we already have 6 tours --}}
                    @endif
                  @endforeach
                  @if($tourCount >= 6)
                    @break {{-- Break out of the first foreach loop if we already have 6 tours --}}
                  @endif
                @endforeach
              </div>
            </section>
          </div>
          


        <!-- Cars -->
        {{-- <section class="container text-center">
          <h2 class="section-title">Transpot</h2>
          <hr width="40" class="text-center"  />
          <div class="row">

          @foreach(\App\Models\Car::get() as $car)
            <div class="col-lg-3 mb-5">
              <div class="card p-3 border-0" style="border-radius: 0;text-align:left;">
                <img style="height: 200px;object-fit: contain;" src="/backend/img/{{ $car->image }}" alt="">
                <h4 class="main-color fw-bold mb-4" style="font-size: 1.4rem">{{ $car->name }}</h4>
                <span class="fw-bold mb-4" >Harga : IDR.{{ $car->price }}</span> 
                <span class="d-flex mb-3"><i class='bx bxs-gas-pump main-color fs-4 me-3 '></i> <strong>Driver + BBM</strong> </span> 
                <span class="d-flex"><i class='bx bxs-time-five main-color fs-4 me-3' ></i> <strong>{{ $car->duration }}</strong></span>
                <a href="#" class="btn mt-4 btn-book">Booking</a> 

              </div>
            </div>
            @endforeach

          </div>
        </section> --}}

        <!--=============== Blog ===============-->

        <div id="travel-bk">
          <section class="container featured-tours" id="promotion-tour">
            <h2 class="section-title">Bài viết</h2>
            <div class="row">
              @foreach($posts as $post)
              
                <div class="col-md-4 col-sm-6 col-xs-12 elememt">
                  <div class="thumbnail block-tour shadow" style="height: 507px; padding: 0px;">
                    <a href="{{ route('posts.show', $post)  }}" title="{{$post->title}}">
                      <img class="img-rounded" src="/backend/img/{{ $post->image}}" alt="{{$post->title}}">
                    </a>
                    <div class="caption" style="padding: 15px;">
                      <a class="title-tour" href="{{ route('posts.show', $post)  }}">
                        {{$post->title}}
                      </a>
                    </div> 
                  
                  </div>
                </div>
              @endforeach 
            </div>
          </section>
        </div>

        <section class="container why-us text-center">
          <h2 class="section-title">Về chúng tôi</h2>
          <hr width="40" class="text-center" />
          <div class="row">
            <div class="col-lg-4 mb-3">
              <div class="card pt-4 pb-3 px-2">
                <div class="why-us-content">
                  <i class="bx bx-money why-us-icon mb-4"></i>
                  <h4 class="mb-3" style="color: rgb(0, 172, 134); ">Tiết kiệm tiền</h4>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-3">
              <div class="card pt-4 pb-3 px-2">
                <div class="why-us-content">
                  <i class="bx bxs-heart why-us-icon mb-4"></i>
                  <h4 class="mb-3" style="color: rgb(0, 172, 134); ">An toàn</h4>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-3">
              <div class="card pt-4 pb-3 px-2">
                <div class="why-us-content">
                  <i class="bx bx-timer why-us-icon mb-4"></i>
                  <h4 class="mb-3" style="color: rgb(0, 172, 134); ">Tiết kiệm thời gian</h4>
                  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

  </main>
@endsection

