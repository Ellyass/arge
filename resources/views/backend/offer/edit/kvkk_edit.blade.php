@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border"></div>
            <div class="box-body">

                <div id="kvkk">
                    <form action="{{route('offer_update')}}" method="POST">
                        @csrf

                        <input type="hidden" name="product" value="2">
                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div id="new_kvkk">
                            <input type="hidden" name="offer_amount" class="form-control" value="1">

                            <!--birim fiyatı varsayılan 1 olarak tanımlanacak -->

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Ücret</label>
                                <input type="number" name="offer_money" class="form-control">
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Yüzdelik</label>
                                <input type="number" name="yuzdelik" class="form-control">
                            </div>
                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Konaklama Durum</label>
                                <select class="form-control" name="home">
                                    <option value="(Konaklama tarafımıza aittir)">Konaklama TARAFIMIZA aittir</option>
                                    <option value="(Konaklama tarafınıza aittir)">Konaklama TARAFINIZA aittir</option>
                                </select>
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Penetrasyon</label>
                                <select class="form-control" name="penetrasyon">
                                    <option value="var">Penetrasyon Testi Var</option>
                                    <option selected value="yok">Penetrasyon Testi Yok</option>

                                </select>
                            </div>

                            <div id="penetrasyon_test_ucret">
                                <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                    <label for="exampleInputPassword1">Penetrasyon Testi Ücreti</label>
                                    <select class="form-control" name="penetrasyon_ucret_sql">
                                        <option selected value="0">Seçiniz</option>
                                        <option value="ucretVar">Penetrasyon Test Ücreti Var</option>
                                        <option value="ucretYok">Penetrasyon Test Ücreti Yok</option>
                                    </select>
                                </div>
                            </div>

                            <div id="ucret_var" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Penetrasyon Testi Ücreti Giriniz</label>
                                <input class="form-control" type="text" name="penetrasyon_ucreti">
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">KDV</label>
                                <select name="kdv" class="form-control">
                                    <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                                    <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                                <input type="date" name="offer_date" class="form-control">
                            </div>
                        </div>


                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="offer_explanation" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-success gonder">Teklifi Kaydet</button>
                        </div>
                    </form>
                    <div class="form-group col-md-10 col-sm3 col-xs-12 col" align="right">
                        <a href="{{ route('document_wordtopdf')}}">
                            <button class="btn btn-danger">Pdf Çevir</button>
                        </a>
                    </div>
                </div>
                <!-- kvkk bitiş-->

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
