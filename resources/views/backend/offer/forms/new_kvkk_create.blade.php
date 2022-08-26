@extends('backend.layout')
@section('content')

<div id="kvkk">

    <div style="margin-left: 10px;">
        <strong>KVKK</strong>
    </div>
    <br>

    <form action="{{route('kvkk_post')}}" method="POST">
        @csrf

        <div class="form-group col-md-5 col-sm-3 col-xs-12" >
            <label for="exampleInputPassword1">Firma Seciniz</label>
            <select class="form-control" name="customer_id">
                @foreach($customers as $customer )
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="product" value="2">

        <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >
            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
            <select class="form-control" name="target_Seller_id" >
                @foreach($sellers as $seller)
                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                @endforeach
            </select>
        </div>


        <input type="hidden" name="new_kvkk_offer" class="form-control" value="new_offer">
        <input type="hidden" name="offer_amount" class="form-control" value="1">

        <!--birim fiyatı varsayılan 1 olarak tanımlanacak -->

        <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
            <label for="exampleInputPassword1">Ücret</label>
            <input type="text" name="offer_money" class="form-control">
        </div>

        <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
            <label for="exampleInputPassword1">Yüzdelik</label>
            <input type="text" name="yuzdelik" class="form-control">
        </div>


        <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
            <label for="exampleInputPassword1">Penetrasyon</label>
            <select class="form-control" name="penetrasyon">
                <option  value="var">Penetrasyon Testi Var</option>
                <option selected value="yok">Penetrasyon Testi Yok</option>

            </select>
        </div>

        <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
            <label for="exampleInputPassword1">Konaklama Durumu</label>
            <select class="form-control" name="home">
                <option value="(Konaklama tarafımıza aittir)">Konaklama TARAFIMIZA aittir</option>
                <option value="(Konaklama tarafınıza aittir)">Konaklama TARAFINIZA aittir</option>
            </select>
        </div>



        <div id="penetrasyon_test_ucret">
            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
                <label for="exampleInputPassword1">Penetrasyon Testi Ücreti</label>
                <select class="form-control" name="penetrasyon_ucret_sql">
                    <option selected value="0">Seçiniz</option>
                    <option value="ucretVar">Penetrasyon Test Ücreti Var</option>
                    <option value="ucretYok">Penetrasyon Test Ücreti Yok</option>
                </select>
            </div>
        </div>

        <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
            <label for="exampleInputPassword1">KDV</label>
            <select name="kdv"  class="form-control">
                <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
            </select>
        </div>

        <div  id="ucret_var" class="form-group col-md-5 col-sm-3 col-xs-12 col">
            <label for="exampleInputPassword1">Penetrasyon Testi Ücreti Giriniz</label>
            <input class="form-control" type="number" name="penetrasyon_ucreti">
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
            <button  class="btn btn-primary">Word Oluştur</button>
        </div>
    </form>
</div>
<!--kvkk bitiş-->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@endsection
@section('css')@endsection
@section('js')@endsection
