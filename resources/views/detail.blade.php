@extends('layouts.app')
<html>
  <style>
		/* Rating */
		.rating_box {
		display: inline-flex;
		}

		.star-rating {
		font-size: 0;
    padding-bottom: 10px;
		padding-right: 10px;
		}

		.star-rating__wrap {
		display: inline-block;
		font-size: 1rem;
		}

		.star-rating__wrap:after {
		content: "";
		display: table;
		clear: both;
		}

		.star-rating__ico {
		float: right;
		padding-left: 2px;
		cursor: pointer;
		color: #F7941D;
		font-size: 16px;
		margin-top: 5px;
		}

		.star-rating__ico:last-child {
		padding-left: 0;
		}

		.star-rating__input {
		display: none;
		}

		.star-rating__ico:hover:before,
		.star-rating__ico:hover ~ .star-rating__ico:before,
		.star-rating__input:checked ~ .star-rating__ico:before {
		content: "\F005";
		}

    .ratings{
      display: flex;
      flex-wrap: wrap;
    }
    .rating{
      display: flex;
      flex-wrap: wrap;
      color: #F7941D
    }
	</style>
</html>
@section('content')
    <main>
      <section class="container mt-5" style="margin-bottom: 70px">
        <div class="col-12 col-md">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="title-alt" href="{{ route('home') }}">Home</a>
              </li>
              <li class="breadcrumb-item main-color">Tour Detail</li>
            </ol>
          </nav>
        </div>

        <div class="col-12 col-md text-center">
          <h1 class="main-color">{{ $tour->name }}</h1>
          <span class="title-alt">{{ $tour->location }}</span>
        </div>
      </section>

      <!--=============== Package Travel ===============-->
      <section class="container detail">
        <div class="row" >

          <div class="col-12 col-md-12 col-lg-7">
          <img id="anhlon" src="/backend/img/{{$tour->galleries->first()->path}}"> 
      
          <div class="gallery-container" style="display: block;">
            @foreach($tour->galleries as $gallery)
                <div class="detail-card">
                    <img
                        src="/backend/img/{{ $gallery->path }}"
                        alt=""
                        class="detail-img anhnho hienthi"
                        onclick="changeImage('/backend/img/{{ $gallery->path }}')"
                    />
                </div>
              @endforeach
          </div>
          </div>

          <div class="col-12 col-md-12 col-lg-5">
            <div class="card bordered card-form" style="padding: 30px 40px">
              <h4 class="text-center">Thông tin Tour</h4>
              <div
                class="alert alert-secondary"
                style="background-color: #f5f5f5; border: 1px solid #f5f5f5"
                role="alert"
              >
                Thời gian: {{ $tour->duration }}
              </div>
              @if($departure)
                <div
                  class="alert alert-secondary"
                  style="background-color: #f5f5f5; border: 1px solid #f5f5f5"
                  role="alert"
                >
                  Giá :
                      <span class="text-gray-500 font-weight-light">
                          {{ number_format($departure->adult) }} VND
                      </span>
                  
                </div>
                <div
                  class="alert alert-secondary"
                  style="background-color: #f5f5f5; border: 1px solid #f5f5f5"
                  role="alert"
                >
                  Số chỗ còn : {{ $departure->quantity }} chỗ
                </div>
              @endif
              <div
                class="alert alert-secondary"
                style="background-color: #f5f5f5; border: 1px solid #f5f5f5"
                role="alert"
              >
                Khởi hành tại : {{ $tour->location_start }} 
              </div>
             <div class="card-bank d-flex align-items-center justify-content-around">
               
              
                <div class="card-bank-content d-flex flex-column">
                 
                </div>
             </div>
             
              <a href="{{ route('checkout', $departure) }}"  class="btn btn-book btn-block mt-3"
                >Đặt Tour</a
              >
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 40px">
          <div class="col-12 col-md-12 col-lg-7 mb-5">
            <div class="card border-0 p-2">
              <h3 class="fw-bolder title mb-4">Lịch trình</h3>
              {!! $tour->description !!}
            </div>
          </div>
         
        </div>
        <div class="col-lg-12 col-12">
          <form class="form" method="POST" action="{{route('user.review_tour', $tour)}}">
            @csrf
            <div class="row">
              <h4>Đánh giá</h4>
                <div class="col-lg-12 col-12">
                    <div class="rating_box">
                          <div class="star-rating">
                            <div class="star-rating__wrap">
                              <input class="star-rating__input" id="star-rating-5" type="radio" name="rate" value="5">
                              <label class="star-rating__ico fa fa-star-o" for="star-rating-5" title="5 out of 5 stars"></label>
                              <input class="star-rating__input" id="star-rating-4" type="radio" name="rate" value="4">
                              <label class="star-rating__ico fa fa-star-o" for="star-rating-4" title="4 out of 5 stars"></label>
                              <input class="star-rating__input" id="star-rating-3" type="radio" name="rate" value="3">
                              <label class="star-rating__ico fa fa-star-o" for="star-rating-3" title="3 out of 5 stars"></label>
                              <input class="star-rating__input" id="star-rating-2" type="radio" name="rate" value="2">
                              <label class="star-rating__ico fa fa-star-o" for="star-rating-2" title="2 out of 5 stars"></label>
                              <input class="star-rating__input" id="star-rating-1" type="radio" name="rate" value="1">
                              <label class="star-rating__ico fa fa-star-o" for="star-rating-1" title="1 out of 5 stars"></label>
                              @error('rate')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                </div>
                    <div class="col-lg-12 col-12">
                      <div class="form-group">
                        <textarea name="review" cols="80" rows="6" required placeholder="Viết đánh giá..." ></textarea>
                      </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="form-group button5">	<br>
                          <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                        </div>
                    </div>
              </div>
           </form>
           <br>

           <div class="ratting-main">
            <div class="avg-ratting">
             
                
              <span style="font-size: 30px"><strong>Tất cả đánh giá</strong></span> 
            </div> <hr> <br>

            @php
                use App\Models\User;
            @endphp
            @foreach($reviews as $review)
              @if($review->status === 'active')
                @php
                  $user = User::where('id',$review->user_id)->first(); 
                @endphp
                <!-- Single Rating -->
                <div class="ratings">
                  <div class="rating-author" style="padding-right: 15px;">          
                    <img src="{{asset('backend/img/avata2.png')}}" style="width: 50px;" alt="Profile.jpg">
                  </div>
                  <div class="rating-des">
                    <h6 style="font-weight: 600;">{{$user->name}} &nbsp;
                      @if($review->IsUserComment)
                        <div class="dropdown">
                          <i class="fa fa-ellipsis-v dropbtn" aria-hidden="true" style="padding: 5px;"></i>
                          <div class="dropdown-content" style="width: 100px;">
                           
                            <form   action="{{ route('reviews.delete', $review) }}" method="POST">
                              @csrf
                              @method('delete')
                              <button onClick="return confirm('Are you sure !')" class="btn btn-danger">
                                  <i class="fa fa-trash"></i>
                              </button>
                            </form>
                        </div>
                  
                        </div>
                      @endif
                    </h6>
                    
                    <div class="ratings">

                      <ul class="rating" style="padding-left: 0px;">
                        @for($i=1; $i<=5; $i++)
                          @if($review->rate>=$i)
                            <li><i class="fa fa-star"></i></li>
                          @else 
                            <li><i class="fa fa-star-o"></i></li>
                          @endif
                        @endfor
                      </ul>
                      
                      <div class="rate-count">(<span>{{$review->rate}}</span>)</div>
                      <ul>{{$review->created_at}}</ul>
                    </div>
                    <ul style="padding-left: 0px; margin-bottom: 5px; margin-top: -5px;">{{$review->review}}</ul>
                    
                    <div style="padding-left: 5px;"> 

                      <i class="fa {{ $review->isLiked ? 'fa-heart' : 'fa-heart-o' }}" aria-hidden="true" data-review-id="{{ $review->id }}"></i> &nbsp;
                      <span class="likes-count">{{ $review->likesCount }}</span>
                        
                      
                      <a href="" class="btn-show-reply-form" data-id="{{$review->id}}" style="color: #212529; font-size: 13px; font-weight: bold">Trả lời</a>
                      <form action="{{ route('user.reply_review', $review) }}" method="POST" style="display: none" class="replyForm form-reply-{{$review->id}}">
                        @csrf
                          <div class="form-group">
                            
                            <textarea name="review" cols="60" rows="3" required placeholder="Nhập nội dung (*)"></textarea>
                          </div>
                          <input type="hidden" name="parent_id" value="{{$review->id}}">
                          <input type="hidden" name="tour_id" value="{{$tour->id}}">
                          <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Gửi phản hồi</button>
                      </form>
                    </div>
                    <hr>
                    @if($review->replies)
                      @if($review->totalRepliesCount) 
                        <div style="margin-top: -30px; padding-left: 15px">
              
                          <a class="replyy show-replies" data-id="{{ $review->id }}" style="color: #212529; font-size: 13px;">
                            <img src="{{asset('frontend/assets/images/curve-arrow-pointing-right.png')}}" style="width: 20px; opacity: 0.7;" alt="">
                            Xem tất cả {{$review->totalRepliesCount}} phản hồi
                        </a>
                        </div>
                    @else
                      @endif
                    
                      @if($review->replies)
                        <div class="all-replies" id="all-replies-{{ $review->id }}" style="display: none;">
                          @include('partials.replies', ['replies' => $review->replies])
                        </div>
                      @endif
                    @else
                    @endif
                  </div>
                </div>
                <br>
              @endif
              <!--/ End Single Rating -->
            @endforeach
          </div>

        </div>
        
      </section>
    </main>
@endsection

@push('styles')
	
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=$('#quantity').val();
            var pro_id=$(this).data('id');
            // alert(quantity);
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
					else{
                        swal('error',response.msg,'error').then(function(){
							document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}

@endpush

@push('style-alt')
    <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swipper/css/style.css') }}">
    <style>
        .swiper-container-3d .swiper-slide-shadow-left,
        .swiper-container-3d .swiper-slide-shadow-right {
        background-image: none;
      }
      figure{
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }
      figure table {
        --bs-table-bg: transparent;
        --bs-table-accent-bg: transparent;
        --bs-table-striped-color: #212529;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        --bs-table-active-color: #212529;
        --bs-table-active-bg: rgba(0, 0, 0, 0.1);
        --bs-table-hover-color: #212529;
        --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: top;
        border-color: #dee2e6;
      }

      tbody, td, tfoot, th, thead, tr {
        border-color: inherit;
        border-style: solid;
      }
      table>:not(caption)>*>*{
        border: 1px solid #dee2e6;
      }
      table>:not(caption)>*>* {
        padding: 0.5rem 0.5rem;
        background-color: transparent;
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px transparent;
      }
    </style>
@endpush

@push('script-alt')
    <script src="{{ asset('frontend/assets/libraries/swipper/js/app.js') }}"></script>
     <script>
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        spaceBetween: 32,
        coverflowEffect: {
          rotate: 0,
        },
      });
    </script>

@endpush
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
  $(document).on('click', '.btn-show-reply-form', function(ev) {
    ev.preventDefault();
    var id = $(this).data('id');
    var form_reply = '.form-reply-' + id;

     if ($(form_reply).is(':visible')) {
        $(form_reply).slideUp();
    } else {
        
        $('.replyForm').slideUp();
        
        $(form_reply).slideToggle();
    }
  });

  $(document).on('click', '.btn-show-reply-form1', function(epv) {
    ev.preventDefault();
    var id = $(this).data('id');
    var form_reply = '.form-reply1-' + id;

    $(form_reply).slideToggle();
  });


  $(document).on('click', '.show-replies', function(ev) {
    ev.preventDefault();
    var reviewId = $(this).data('id');
    var repliesSelector = '#all-replies-' + reviewId;

    
    $(repliesSelector).slideToggle();

    $(this).hide();
  });

  $(document).on('click', '.fa-heart-o, .fa-heart', function() {
    var reviewId = $(this).data('review-id');
    var likeIcon = $(this); 
    var likesCountSpan = $(this).siblings('.likes-count');

    $.ajax({
        url: '/like-review',
        type: 'POST',
        data: {
            review_id: reviewId,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            
            if(response.liked) {
                likeIcon.removeClass('fa-heart-o').addClass('fa-heart');
            } else {
                likeIcon.removeClass('fa-heart').addClass('fa-heart-o');
            }
            
            likesCountSpan.text(response.likesCount);
        }
    });
  });

  function changeImage(src) {
    document.getElementById('anhlon').src = src;
  }

</script>

