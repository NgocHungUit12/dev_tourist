  <header class="header" id="header">
      <div id="top-header">
        <div class="container">
          <div class="col-sm-12">
            <div class="right">
              <ul class="social">
                <li>
                  <a href="#" style="color: #ffc10e; font-weight: bold;">1900 9999</a>
                </li>
                <li>
                  <a href="#">|</a>
                </li>
                <li>
                  <a href="" style="font-style: italic;">anhb1910030@student.ctu.edu.vn</a>
                </li>
                <li>
                  <a href="">Tin tức</a>
                </li>
                <li>
                  <a href=""><i class="fa fa-shopping-cart"></i></a>
                </li>
                <li>
                  <a href=""><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href=""><img style="width: 20px;" src="https://benthanhtourist.com/img/Home/uk.jpg" alt=""></a>
                </li>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
      <div id="m-header">
      <nav class="nav container">
        <a href="{{ route('home') }}" class="nav__logo"
          >VietNamTourist <img style="width: 50px;" src="https://cdn-icons-png.flaticon.com/512/2200/2200326.png" alt=""></a>
          

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="{{ route('home') }}" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}"">
                <i class="bx bx-home-alt nav__icon"></i>
                <span class="nav__name">TRANG CHỦ</span>
              </a>
            </li>

            <!-- <li class="nav__item">
              <a href="#about" class="nav__link">
                <i class="bx bx-user nav__icon"></i>
                <span class="nav__name">About</span>
              </a>
            </li> -->
           
            <li class="nav__item dropdown">
              <a href="{{ route('tour') }}" class="nav__link {{ request()->is('tour') ? ' active-link' : '' }}">
                <i class="bx bx-briefcase-alt nav__icon"></i>
                <span class="nav__name">DU LỊCH</span>
              </a>
              <div class="box-mega-menu container dropdown-content" data-menu-mega="travel">
                <div class="panel-content">
                    <ol class="panel-head">
                        @foreach($categories as $category)
                            <li class="menu-item" target-level="1" data-target="{{$category->id}}">
                                <a href="{{ route('tour_filter',$category) }}">
                                    {{$category->title}}
                                </a>
                                <i class="fa fa-angle-right ml-auto" aria-hidden="true"></i>
                            </li>
                        @endforeach
                    </ol>
                    <div class="panel-child">
                        @foreach($categories as $category)
                            <ul class="level-1" data-target-level-1="1" id="{{$category->id}}" >
                                @foreach($category->region_categories as $region)
                                    <li>
                                        <a href="{{route('tour_region', $region)}}">
                                            {{ $region->title }}
                                        </a>
                                        <ul class="level-2" data-target-level-2="1">
                                            @foreach($region->provine_categories as $provine)
                                                <li class="">
                                                    <a href="{{ route('tour_province', $provine)}}">
                                                        {{ $provine->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>
                </div>
              </div>
            </li>
                
          
            
            <li class="nav__item">
              <a href="{{ route('posts') }}" class="nav__link {{ request()->is('posts') ? ' active-link' : '' }}">
                <i class="bx bx-book-alt nav__icon"></i>
                <span class="nav__name">BÀI VIẾT</span>
              </a>
            </li>

            <li class="nav__item">
              <a href="{{ route('contact') }}" class="nav__link {{ request()->is('contact') ? ' active-link' : '' }}">
                <i class="bx bx-message-square-detail nav__icon"></i>
                <span class="nav__name">LIÊN HỆ</span>
              </a>
            </li>
            <li>
              
              
  
              @auth 
                  @if(Auth::user()->role=='0')
                    <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">{{Auth()->user()->name}}</a></li>
                  @else 
                    <li><i class="ti-user"></i> <a href="{{route('auth.profile')}}"  target="_blank">{{Auth()->user()->name}}</a></li>
                  @endif
                  <li><i class="ti-power-off"></i> <a href="{{route('logout')}}">ĐĂNG XUẤT</a></li>
                  @else
                  <li><i class="ti-power-off"></i><a href="{{route('login')}}">ĐĂNG NHẬP /</a> <a href="{{route('register')}}">ĐĂNG KÝ</a></li>
              @endauth

            </li>
            
          </ul>
        </div>
      </nav>
    </div>
    </header>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    <script>
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('mouseover', function() {
                
                document.querySelectorAll('.level-1').forEach(ul => {
                    ul.classList.remove('active');
                });

        
                const targetId = this.getAttribute('data-target');
                const targetUl = document.getElementById(targetId);
                if (targetUl) {
                    targetUl.classList.add('active');
                }
            });
        });

    </script>