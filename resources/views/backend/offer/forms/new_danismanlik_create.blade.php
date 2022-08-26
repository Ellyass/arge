@extends('backend.layout')
@section('content')

    <div id="danismanlik">

        <div style="margin-left: 10px;">
            <strong>Danışmanlık</strong>
        </div>
        <br>

        <form action="{{route('danismanlik_post')}}" method="POST">
            @csrf

            <div class="form-group col-md-5 col-sm-3 col-xs-12" >
                <label for="exampleInputPassword1">Firma Seciniz</label>
                <select class="form-control" name="customer_id">
                    @foreach($customers as $customer )
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>



            <input type="hidden" name="product" value="5">
            <input type="hidden" name="new_danismanlik_offer" value="new_offer">


            <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >
                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                <select class="form-control" name="target_Seller_id" >
                    @foreach($sellers as $seller)
                        <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="offer_amount" class="form-control" value="1">

            <!--birim fiyatı varsayılan 1 olarak tanımlanacak -->
            <div class="col-md-5 col-sm-3 col-xs-12">
                <label for="exampleInputPassword1">Aylık/Net</label>
                <select class="form-control col-md-5 col-sm-3 col-xs-12 " name="danismanlik_type" >
                    <option selected value="seç">Seçiniz</option>
                    <option value="Aylık">Aylık</option>
                    <option value="">Net Ücret</option>
                </select>
            </div>

            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
                <label for="exampleInputPassword1">Ücret</label>
                <input type="number" name="offer_money" class="form-control">
            </div>

            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
                <label for="exampleInputPassword1">Yüzdelik</label>
                <input type="number" name="yuzdelik" class="form-control">
            </div>

            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
                <label for="exampleInputPassword1">Konaklama Durum</label>
                <select class="form-control" name="home">
                    <option value="(Konaklama tarafımıza aittir)">Konaklama tarafımıza aittir</option>
                    <option value="(Konaklama tarafınıza aittir)">Konaklama tarafınıza aittir</option>
                    <option value="">bos</option>
                </select>
            </div>

            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
                <label for="exampleInputPassword1">KDV</label>
                <select name="kdv"  class="form-control">
                    <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                    <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
                </select>
            </div>

            <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >
                <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                <input type="date" required name="offer_date" class="form-control">
            </div>

            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >
                <label for="exampleInputPassword1">Açıklama Giriniz</label>
                <input type="text" name="explanation" class="form-control">
            </div>


            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                <button  class="btn btn-primary gonder">Word Oluştur</button>
            </div>
        </form>
    </div>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@endsection
@section('cs')@endsection
@section('js')@endsection
