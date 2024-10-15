@extends('layouts.app')

@section('content')
<main class="web-content" id="main-content">
    <div class="blog-heading hidden-xs hidden-sm" bis_skin_checked="1">
        <img src="https://benthanhtourist.com/img/cart/bn4.jpg" alt="">
        <div class="blog-title" bis_skin_checked="1">
            <strong style="font-weight: 700;">THANH TOÁN</strong>
            <span>Thông tin thanh toán</span>
        </div>
    </div>
    <section id="cart-page">
        <div class="container" bis_skin_checked="1">
          
                <button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <input type="hidden" name="num_seats" value="{{$departure->quantity}}" id="num_seats">
                <div class="row" bis_skin_checked="1">
                    <div class="col-lg-4 col-sm-5" bis_skin_checked="1">
                        <div class="panel" bis_skin_checked="1">
                            <div class="panel-heading" bis_skin_checked="1">
                                <i class="fa fa-credit-card"></i> THÔNG TIN NGƯỜI ĐẶT
                            </div>
                            <div class="panel-body" bis_skin_checked="1">
                                <strong class="total"></strong>
                                
                                <div class="form-group" bis_skin_checked="1">
                                    <input type="text" class="form-control" placeholder="Họ và tên" name="name" data-bv-field="name" required>
                                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="NOT_VALIDATED" style="display: none;">Họ tên là bắt buộc</small>
                                </div>
                                <div class="form-group" bis_skin_checked="1">
                                    <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" data-bv-field="phone" required>
                                    <small class="help-block" data-bv-validator="digits" data-bv-for="phone" data-bv-result="NOT_VALIDATED" style="display: none;">Số điện thoại không đúng. Chỉ hỗ trợ nhập số.</small><small class="help-block" data-bv-validator="notEmpty" data-bv-for="phone" data-bv-result="NOT_VALIDATED" style="display: none;">Số điện thoại là bắt buộc</small>
                                </div>
                                <div class="form-group" bis_skin_checked="1">
                                    <input type="text" class="form-control" placeholder="Email" name="email" data-bv-field="email" required>
                                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="NOT_VALIDATED" style="display: none;">Email là bắt buộc</small><small class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="NOT_VALIDATED" style="display: none;">Email không hợp lệ.</small>
                                </div>
                                <div class="form-group" bis_skin_checked="1">
                                    <input type="text" class="form-control" placeholder="Địa chỉ" name="address" data-bv-field="address" required>
                                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="address" data-bv-result="NOT_VALIDATED" style="display: none;">Địa chỉ là bắt buộc</small>
                                </div>
                                <div class="form-group row promotion-code" bis_skin_checked="1">
                                    <div class="col-sm-8" bis_skin_checked="1">
                                        <input type="text" class="form-control" placeholder="Nhập mã giảm giá" name="code_promotion">
                                    </div>
                                    <div class="col-sm-4" bis_skin_checked="1" >
                                        <a href="" class="btn btn-default btn-coupon pull-right" >Kiểm tra</a>
                                    </div>
                                  
                                    <small class="help-block col-sm-12"></small>
                                </div>
                                <div class="payment panel has-error" bis_skin_checked="1">
                                    <div class="payment-item" bis_skin_checked="1">
                                        <input type="radio" name="payment_method" value="paypal"> <label>Chuyển khoản ngân hàng</label>
                                        <div id="payment-paypal" class="panel payment-info hide" bis_skin_checked="1">
                                            <div class="panel-body" bis_skin_checked="1">
                                                <p>
                                                    <strong><span style="font-size:13px">THÔNG TIN THANH TOÁN CHUYỂN KHOẢN</span></strong>
                                                </p>
                                                <p>- Ngân hàng TMCP Ngoại Thương Việt Nam - CN TP.HCM (VCB)</p>
                                                <p>- Tên đơn vị hưởng: CÔNG TY CỔ PHẦN DỊCH VỤ DU LỊCH BẾN THÀNH</p>
                                                <p>- Số tài khoản VNĐ: 007.‎‎1001204617</p>
                                                <p>- Tại Ngân Hàng VCB - CN TP.HCM</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="payment-item" bis_skin_checked="1">
                                        <input type="radio" name="payment_method" value="cod"> <label>Thanh toán tại văn phòng</label>
                                        <div id="payment-cod" class="panel payment-info hide" bis_skin_checked="1">
                                            <div class="panel-body" bis_skin_checked="1">
                                                <h4 style="color: #003d71; font-weight: bold">VietNam Tourist<br></h4>
                                                <hr>
                                                <p>
                                                    <strong>Địa chỉ:</strong> Đại học Cần Thơ, Khu II, 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ<br>
                                                    <strong>Điện thoại:</strong> <a href="tel:0287.302.3368" class="link-payment">0123456789</a><br>
                                                    <strong>Tổng đài:</strong> <a class="link-payment" href="tell:1900 6668">1900 9999</a>
                                                    <br>
                                                    <strong>Hotline:</strong> <a class="link-payment" href="tell:0832 666 000">0999 9999</a> <br>
                                                    <strong>Email:</strong> <a class="link-payment" href="mailto:fit.outbound@benthanhtourist.com">anhb1910030@student.ctu.edu.vn</a>
                                                    <a class="link-payment" href="mailto:anhb1910030@gmail.com">anhb1910030@gmail.com</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="payment-method-error help-block hide">Vui lòng chọn phương thức thanh toán</small>
                                </div>
                                {{-- <button class="btn btn-second btn-block">THANH TOÁN1</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-7" bis_skin_checked="1">
                        <div class="cart-list panel" bis_skin_checked="1">
                            <div class="panel-heading" bis_skin_checked="1">
                                <i class="fa fa-shopping-cart"></i> THÔNG TIN VỀ SẢN PHẨM / DỊCH VỤ
                            </div>
                            <div class="panel-body" bis_skin_checked="1">
                                <div class="thumbnail cart-item clearfix" bis_skin_checked="1">
                                    <div class="img-cart" bis_skin_checked="1">
                                        <img class="img-rounded" src="/backend/img/{{ $tour->galleries->first()->path }}" alt="">
                                    </div>
                                    <div class="info-cart" bis_skin_checked="1">
                                        <div class="caption" bis_skin_checked="1">
                                            @if($departure)
                                                <h3 class="travel_name">{{$tour->name}}</h3>
                                                <p>
                                                    <strong>Ngày khởi hành:</strong>
                                                    <span>{{$departure->departure_day}}</span>
                                                </p>
                                                <p><i class="fa fa-users" aria-hidden="true"></i> Số chỗ còn nhận: <span>{{$departure->quantity}}</span></p>
                                                <div class="cart-detail" bis_skin_checked="1">
                                                    <div class="line-price" bis_skin_checked="1">
                                                        <strong class="customer">Người lớn</strong>
                                                        <input class="qty" type="number" min="1" value="1" name="adult" >
                                                        <span class="item-price">x {{$departure->adult}} =</span>
                                                        <input type="hidden" id="payment-adult-price" value="{{$departure->adult}}">
                                                        <strong class="line-total" id="total-adult-price"></strong>
                                                    </div>
                                                    <div class="line-price" bis_skin_checked="1">
                                                        <strong class="customer">Trẻ em(6-&gt;11 tuổi)</strong>
                                                        <input class="qty" type="number" min="0" value="0" name="child_6_11" >
                                                        <span class="item-price">x {{$departure->children_6_11}} =</span>
                                                        <input type="hidden" id="payment-child_6_11-price" value="{{$departure->children_6_11}}">
                                                        <strong class="line-total" id="total-child-6-11-price"></strong>
                                                    </div>
                                                    <div class="line-price" bis_skin_checked="1">
                                                        <strong class="customer">Trẻ em(dưới 6 tuổi)</strong>
                                                        <input class="qty" type="number" min="0" value="0" name="child_6" >
                                                        <span class="item-price">x {{$departure->children_6}} =</span>
                                                        <input type="hidden" id="payment-child_6-price" value="{{$departure->children_6}}">
                                                        <strong class="line-total" id="total-child-6-price"></strong>
                                                    </div>
                                                    <div class="line-price" bis_skin_checked="1">
                                                        <strong class="customer">Trẻ em(&lt;2 tuổi)</strong>
                                                        <input class="qty" type="number" min="0" value="0" name="child_free">
                                                        <span class="item-price">x 0 =</span><strong class="line-total">0 vnđ</strong>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="cart-item-total" bis_skin_checked="1">
                                                <strong>Tổng</strong>
                                                <span class="total"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix" bis_skin_checked="1"></div>
                                <div class="cart-total" style="overflow: hidden;" bis_skin_checked="1">
                                    <div class="pull-left" bis_skin_checked="1">
                                        <form action="{{ route('order.store', $tour->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="total" id="total">
                                            <input type="hidden" name="payment_method1">
                                            <input type="hidden" name="name1" required>
                                            <input type="hidden" name="email1" required>
                                            <input type="hidden" name="phone1">
                                            <input type="hidden" name="address1">
                                            <input type="hidden" name="adult1" value="1">
                                            <input type="hidden" name="child_6_111" value="1">
                                            <input type="hidden" name="child_61" value="0">
                                            <input type="hidden" name="child_free1" value="0">
                                            <input type="hidden" name="coupon1">
                                            <input type="hidden" name="departure_id" value="{{$departure->id}}">
                                
                                            <button type="submit" class="check-buy btn btn-primary">Thanh toán</button>
                                        </form>
                                        
                                    </div>
                                    <div class="pull-right" bis_skin_checked="1">
                                        TỔNG CỘNG: <span class="total"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <small class="help-block" data-bv-validator="greaterThan" data-bv-for="adult" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value greater than or equal to %s</small><small class="help-block" data-bv-validator="integer" data-bv-for="adult" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid number</small>
                        <small class="help-block" data-bv-validator="greaterThan" data-bv-for="child" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value greater than or equal to %s</small>
                        <small class="help-block" data-bv-validator="integer" data-bv-for="child" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid number</small>
                    </div>
                </div>
               
        </div>
        
        
    </section>
    <style>
            #cart-page .payment .payment-item .payment-info .panel-body strong {
                display: inline;
            }
        </style>
    {{-- <div id="subscription" bis_skin_checked="1">
        <div class="container" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-md-6 col-sm-6" bis_skin_checked="1">
                    <div class="icon-email" bis_skin_checked="1">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <h4>Đăng ký để nhận Bản Tin</h4>
                    <span>Nhập email để nhận chương trình tour khuyến mãi nhanh nhất và các ưu đãi hấp dẫn khác</span>
                </div>
                <div class="col-md-5 col-md-offset-1 col-sm-6" bis_skin_checked="1">
                    <form id="formRegisterVoucher" class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <button class="btn btn-subscribe" onclick="registerVoucher(event)">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</main>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[type="radio"][name="payment_method"]').change(function() {
            // Ẩn tất cả các thông tin thanh toán
            $('.payment-info').addClass('hide');

            // Hiển thị thông tin tương ứng với lựa chọn
            var selectedPaymentMethod = $(this).val();
            $('#payment-' + selectedPaymentMethod).removeClass('hide');
            
        });
    });

    $(document).ready(function() {

        var previousValue = { adult: 1, child_6_11: 0, child_6: 0, child_free: 0 };

    // Cập nhật tổng giá tiền khi số lượng thay đổi
        function updateTotalPrice() {
            var adultPrice = parseFloat($('#payment-adult-price').val());
            var child_6_11_Price = parseFloat($('#payment-child_6_11-price').val());
            var child_6_Price = parseFloat($('#payment-child_6-price').val());
            var maxSeats = parseInt($('#num_seats').val());

            var numAdults = parseInt($('input[name="adult"]').val()) || 0;
            var numChildren_6_11 = parseInt($('input[name="child_6_11"]').val()) || 0;
            var numChildren_6 = parseInt($('input[name="child_6"]').val()) || 0;
            var numChildren_free = parseInt($('input[name="child_free"]').val()) || 0;

            var totalAdultPrice = numAdults * adultPrice;
            $('#total-adult-price').text(totalAdultPrice.toLocaleString() + ' vnđ');

            var totalChild_6_11_Price = numChildren_6_11 * child_6_11_Price;
            $('#total-child-6-11-price').text(totalChild_6_11_Price.toLocaleString() + ' vnđ');

            var totalChild_6_Price = numChildren_6 * child_6_Price;
            $('#total-child-6-price').text(totalChild_6_Price.toLocaleString() + ' vnđ');

            if (numAdults + numChildren_6_11 + numChildren_6 + numChildren_free > maxSeats) {

                alert("Số lượng khách không được vượt quá " + maxSeats);

                $('input[name="adult"]').val(previousValue.adult);
                $('input[name="child_6_11"]').val(previousValue.child_6_11);
                $('input[name="child_6"]').val(previousValue.child_6);
                $('input[name="child_free"]').val(previousValue.child_free);
                
                return;
            }

            previousValue = { 
                adult: numAdults, 
                child_6_11: numChildren_6_11, 
                child_6: numChildren_6, 
                child_free: numChildren_free 
            };

            var totalPrice = (numAdults * adultPrice) + (numChildren_6_11 * child_6_11_Price) + (child_6_Price * numChildren_6);

            $('.total').text(totalPrice.toLocaleString() + ' vnđ');
            
            document.getElementById('total').value = totalPrice;
            
        }

        // Bắt sự kiện thay đổi trên các trường số lượng
        $('input[name="adult"], input[name="child_6_11"], input[name="child_6"], input[name="child_free"]').on('change', function() {
            updateTotalPrice();
        });
        // Cập nhật giá tiền lần đầu
        updateTotalPrice();

        function updateTotalPrice1(discountType, discountValue) {
            var totalPrice = ($('#total').val());
            var discountedPrice = totalPrice;

            if(discountType === 'percent') {
                discountedPrice -= (totalPrice * discountValue / 100);
                $('input[name="coupon1"]').val(totalPrice * discountValue / 100);
            } else if(discountType === 'vnđ') {
                discountedPrice -= discountValue;
                $('input[name="coupon1"]').val(discountValue);
            }

            if(discountedPrice < 0) discountedPrice = 0; 

            //Cập nhật giá trị với id và class
            $('.total').text(discountedPrice.toLocaleString() + ' vnđ'); 
            document.getElementById('total').value = discountedPrice;
        
        }

        $('.btn-coupon').click(function(e) {
            e.preventDefault();

            var code = $('input[name="code_promotion"]').val();

            $.ajax({
                url: '/discount-checking', 
                type: 'GET',
                data: { code: code },
                success: function(response) {
                    if (response.valid) {
                        alert('Áp dụng mã giảm giá thành công. Bạn được giảm: ' + response.discount + response.type);
                        updateTotalPrice1(response.type, response.discount);
                       
                    } else {
                        alert('Mã giảm giá không hợp lệ.');
                    }
                },
                error: function() {
                    alert('Có lỗi xảy ra khi kiểm tra mã giảm giá');
                }
            });
        });

    });

    // $(document).ready(function() {

    //     var totalPrice = parseFloat($('#total').val());

        
    // });

    $(document).ready(function() {

        $('input[name="name"]').on('input', function() {
            var inputValue = $(this).val();
            $('input[name="name1"]').val(inputValue);
        });
        $('input[name="email"]').on('input', function() {
            var inputValue = $(this).val();
            $('input[name="email1"]').val(inputValue);
        });
        $('input[name="phone"]').on('input', function() {
            var inputValue = $(this).val();
            $('input[name="phone1"]').val(inputValue);
        });
        $('input[name="address"]').on('input', function() {
            var inputValue = $(this).val();
            $('input[name="address1"]').val(inputValue);
        });
        $('input[name="payment_method"]').on('input', function() {
            var inputValue = $(this).val();
            $('input[name="payment_method1"]').val(inputValue);
        });
        $('input[name="adult"]').on('input', function() {
            var inputValue = $(this).val();
            $('input[name="adult1"]').val(inputValue);
        });
        $('input[name="child_6_11"]').on('input', function() {
            var inputValue = $(this).val();
            $('input[name="child_6_111"]').val(inputValue);
        });
        $('input[name="child_6"]').on('input', function() {
            var inputValue = $(this).val();
            $('input[name="child_61"]').val(inputValue);
        });
        $('input[name="child_free"]').on('input', function() {
            var inputValue = $(this).val();
            $('input[name="child_free1"]').val(inputValue);
        });
       
        

    });
    
</script>