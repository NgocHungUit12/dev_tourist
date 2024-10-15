@foreach ($tours as $tour)
<li class="quantity">Quantity
    <div class="d-flex">
        <input name="quantity"wire:model="quantity" type="number" min="1" max="{{$tour->quality}}" value="{{$quantity}}">
    </div> 
    
    <div class="order_subtotal">Tạm Tính<span> {{ number_format($tour->price*$quantity) }} VNĐ</span></div>
    <input type="hidden" name="total_amount" value="{{$tour->price*$quantity}}">
    
</li>
@endforeach




