@extends('backend.layout')
@section('content')
    <div id="dkvkk">

        <div style="margin-left: 10px;">
            <strong>DİJİTAL KVKK</strong>
        </div>
        <br>
        <form action="{{route('dkvkk_post')}}" method="POST">
            @csrf

            <div class="form-group col-md-5 col-sm-3 col-xs-12">
                <label for="exampleInputPassword1">Firma Seciniz</label>
                <select class="form-control" name="customer_id">
                    @foreach($customers as $customer )
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="product" value="11">
            <input type="hidden" name="teklif_new" value="Evet">


            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                <select class="form-control" name="target_Seller_id">
                    @foreach($sellers as $seller)
                        <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Yazılım Kurulum Ücreti</label>
                <input type="number" name="offer_yazılım" class="form-control">
            </div>

            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Güncelleme Aralığı</label>
                <select name="accept_type" class="form-control">
                    <option value="null">Seçiniz</option>
                    <option value="Aylık">Aylık</option>
                    <option value="Yıllık">Yıllık</option>
                </select>
            </div>

            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">KDV</label>
                <select name="kdv" class="form-control">
                    <option value="KDV DAHİL">KDV DAHİL</option>
                    <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>
                </select>
            </div>

            <div id="dkvkk_s_y" class="form-group col-md-5 col-sm-3 col-xs-12 col">

                <div id="L_aylik" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                    <label for="exampleInputPassword1">Aylık Ücret : </label>
                </div>

                <div id="L_yillik" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                    <label for="exampleInputPassword1">Yıllık Ücret : </label>
                </div>

                <div class="form-group col-md-6 col-sm-3 col-xs-12 col">
                    <input type="number" name="offer_money" minlength="1" maxlength="100" class="form-control">
                </div>
            </div>


            <div class="form-group form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                <input type="date" required name="offer_date" class="form-control">
            </div>


            <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Açıklama Giriniz</label>
                <input type="text" name="explanation" class="form-control">
            </div>


            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                <button class="btn btn-primary">Word Oluştur</button>
            </div>
        </form>
        <div class="form-group col-md-10 col-sm3 col-xs-12 col" align="right">
            <a href="{{ route('document_wordtopdf')}}">
                <button class="btn btn-danger">Pdf Çevir</button>
            </a>
        </div>
    </div>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {
                    if ($(this).attr("value") == "Aylık") {
                        $("#L_aylik").show();
                        $("#L_yillik").hide();
                        $("#dkvkk_s_y").show();
                    }
                    if ($(this).attr("value") == "Yıllık") {
                        $("#L_aylik").hide();
                        $("#L_yillik").show();
                        $("#dkvkk_s_y").show();
                    }
                    if ($(this).attr("value") == "null") {
                        $("#L_aylik").hide();
                        $("#L_yillik").hide();
                        $("#dkvkk_s_y").hide();
                    }
                });
            }).change();
        });
    </script>

@endsection
@section('css')@endsection
@section('js')@endsection
