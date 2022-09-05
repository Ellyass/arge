@extends('backend.layout')
@section('content')

    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border"></div>
            <div class="box-body">

                <div id="egitim">

                    <form action="{{route('offer_update')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
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
                            <button class="btn btn-success">Teklif Kaydet</button>
                        </div>

                    </form>
                </div>
                <!--egitim bitis-->

            </div>
        </div>
    </section>

    <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@endsection
@section('css')@endsection
@section('js')@endsection
