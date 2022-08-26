@extends('backend.layout')
@section('content')
    <div id="dtesvik">

        <div style="margin-left: 10px;">
            <strong>DİJİTAL TEŞVİK</strong>
        </div>
        <br>

        <div class="container container-fluid">
            <form action="{{route('dtesvik_post')}}" method="POST" >
                @csrf

                <div class="form-group col-md-5 col-sm-3 col-xs-12" >
                    <label for="exampleInputPassword1">Firma Seciniz</label>
                    <select class="form-control" name="customer_id">
                        @foreach($customers as $customer )
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="product" value="12">
                <input type="hidden" name="teklif_new" value="Evet">


                <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >
                    <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                    <select class="form-control" name="target_Seller_id" >
                        @foreach($sellers as $seller)
                            <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
                    <label for="exampleInputPassword1">Ücret</label>
                    <input type="number" name="offer_money" class="form-control" value="" >
                </div>

                <div  class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
                    <label for="exampleInputPassword1">KDV</label>
                    <select name="kdv"  class="form-control">
                        <option value="KDV DAHİL">KDV DAHİL</option>
                        <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>
                    </select>
                </div>

                <div class="form-group form-group col-md-5 col-sm-3 col-xs-12 col" >
                    <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                    <input type="date" required name="offer_date" class="form-control">
                </div>


                <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >
                    <label for="exampleInputPassword1">Açıklama Giriniz</label>
                    <input type="text" name="explanation" class="form-control">
                </div>

{{--                <div class="form-group col-md-3 col-sm-3 col-xs-12 col" >--}}
{{--                    <label for="exampleInputPassword1">Teklif Dosyası </label>--}}
{{--                    <input type="file" name="offer_file" class="form-control">--}}
{{--                </div>--}}

                <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                    <button  class="btn btn-primary">Word Oluştur</button>
                </div>
            </form>
        </div>
    </div>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


@endsection
@section('css')@endsection
@section('js')@endsection
