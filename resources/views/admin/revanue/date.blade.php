@extends('admin.layout')

@section('content')
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống kê doanh thu</h1>
    </div>

    <select name="type_revanue" id="type_revanue">
        <option value="">Loại thống kê</option>
        <option value="date">Theo ngày</option>
        <option value="month">Theo tháng</option>
        <option value="year">Theo năm</option>
    </select>
    <div id="date" class="date">
        <form action="{{ route('revanue.date.post')}}" method="POST">
            @csrf
            <div style="display: flex; align-items: center; padding-top: 10px;">
                <p style="margin: 0; padding-right: 10px;">THỐNG KÊ THEO NGÀY</p>
                <p style="margin: 0; padding-right: 5px;">Từ ngày</p>
                <input type="date" style="margin-right: 10px;" name="date_start">
                <p style="margin: 0; padding-right: 5px;">Đến ngày</p>
                <input type="date" style="margin-right: 10px;" name="date_end">
                <button class="btn btn-primary">Thống kê</button>
            </div>
        </form>
    </div>
    <div id="month" class="month">
        <form action="{{ route('revenue_month')}}" method="POST">
            @csrf
            <div style="display: flex; align-items: center; padding-top: 10px;">
                <p style="margin: 0; padding-right: 10px;">THỐNG KÊ THEO THÁNG</p>
                <p style="margin: 0; padding-right: 5px;">Năm</p>
                <input type="number" name="year">
                <button class="btn btn-primary">Thống kê</button>
            </div>
        </form>
    </div>
    <div id="year" class="year">
        <form action="{{ route('revenue_year')}}" method="POST">
            @csrf
            <div style="display: flex; align-items: center; padding-top: 10px;">
                <button class="btn btn-primary">Thống kê</button>
            </div>
        </form>
    </div>

    <h2>Doanh thu từ ngày {{$startDate}} đến ngày {{$endDate}}</h2>
    <div id="myChart" style="height: 250px;"></div>
    

</div>
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#date, #month, #year').hide();
        $('#type_revanue').change(function() {
            var selectedValue = $(this).val();
            $('#date, #month, #year').hide();

            if (selectedValue === 'date') {
                $('#date').show();
            } else if (selectedValue === 'month') {
                $('#month').show();
            } else if (selectedValue === 'year') {
                $('#year').show();
            }
        });
    });

   
    var revenueDate = @json($revenueStats);
    console.log(revenueDate)
    new Morris.Line({
    
        element: 'myChart',
        data: revenueDate,
        xkey: 'date',
        ykeys: ['total'],
        labels: ['Doanh thu']
    });
    
</script>
@endsection