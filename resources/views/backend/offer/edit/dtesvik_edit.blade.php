@extends('backend.layout')
@section('content')

    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border"></div>
            <div class="box-body">

                <div id="dtesvik">

                    <form action="{{route('offer_update')}}" method="POST">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
                        <input type="hidden" name="product" value="12">

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Ücret</label>
                            <input type="number" name="offer_money" class="form-control" value="">
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">KDV</label>
                            <select name="kdv" class="form-control">
                                <option value="KDV DAHİL">KDV DAHİL</option>
                                <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>
                            </select>
                        </div>

                        <div class="form-group form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                            <input type="date" required name="offer_date" class="form-control">
                        </div>


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-success">Teklif kaydet</button>
                        </div>
                    </form>
                </div>

                <!--dtesvik bitiş-->

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
