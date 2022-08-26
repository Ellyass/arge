@extends('backend.layout')
@section('content')
    <div id="Egitim">

        <div style="margin-left: 10px;">
            <strong>EĞİTİM</strong>
        </div>
        <br>

        <form action="{{route('egitim_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-5 col-sm-3 col-xs-12">
                <label for="exampleInputPassword1">Firma Seciniz</label>
                <select class="form-control" name="customer_id">
                    @foreach($customers as $customer )
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="product" value="3">


            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                <select class="form-control" name="target_Seller_id">
                    @foreach($sellers as $seller)
                        <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Eğitim Gün Sayısı</label>
                <input type="number" name="offer_amount" class="form-control">
            </div>


            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Birim Fiyatı(Günlük Ücret)</label>
                <input type="number" name="offer_money" class="form-control">
            </div>

            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">KDV</label>
                <select name="kdv" class="form-control">
                    <option value="Aylık">KDV DAHİL</option>
                    <option value="Yıllık">KDV DAHİL DEĞİL</option>
                </select>
            </div>

            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                <input type="date" name="offer_date" class="form-control" required>
            </div>

            <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Açıklama Giriniz</label>
                <input type="text" name="explanation" class="form-control">
            </div>


            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                <button class="btn btn-primary">Word Oluştur</button>
            </div>
        </form>
    </div>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@endsection
@section('css')@endsection
@section('js')@endsection
