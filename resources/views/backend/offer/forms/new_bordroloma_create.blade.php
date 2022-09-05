@extends('backend.layout')
@section('content')
    <div style="margin-left: 10px;">
        <strong>BORDROLAMA</strong>
    </div>
    <br>
    <div id="bodrolama">
        <form action="{{route('bordrolama_post')}}" method="POST">

            @csrf

            <div class="form-group col-md-5 col-sm-3 col-xs-12">
                <label for="exampleInputPassword1">Firma Seciniz</label>
                <select class="form-control" name="customer_id">
                    @foreach($customers as $customer )
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="product" value="4">
            <input type="hidden" name="teklif_new" value="Evet">


            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                <select class="form-control" name="target_Seller_id">
                    @foreach($sellers as $seller)
                        <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5 col-sm-3 col-xs-12">
                <label for="exampleInputPassword1">Bordro Ücreti</label>
                <select class="form-control col-md-5 col-sm-3 col-xs-12 " name="bordro_type">
                    <option selected value="seç">Seçiniz</option>
                    <option value="bordro_ucret">Bodro Başı</option>
                    <option value="net_ucret">Net Ücret</option>
                </select>
            </div>

            <div class="col-md-5 col-sm-3 col-xs-12">
                <label for="exampleInputPassword1">Teşvik Ücreti</label>
                <select class="form-control col-md-5 col-sm-3 col-xs-12 " name="tesvik_type">
                    <option selected value="null">Teşvik Hizmeti Yok</option>
                    <option value="Ücretsiz">Ucretsiz</option>
                    <option value="net_ucret_tesvik">Net Ücret</option>
                    <option value="yuzdelik_ucret_tesvik">Yüzdelik</option>
                </select>
            </div>

            <div id="bordro_type" style=" margin-top: 10px;" class="form-group  col-md-5 col-sm-3 col-xs-12 col">
                <div id="net_ucrett">
                    <label for="exampleInputPassword1">Net Ücret(Aylık)</label>
                </div>

                <div id="basi_ucret">
                    <label for="exampleInputPassword1">Bordro Başı</label>
                </div>

                <input type="number" name="offer_money" class="form-control">
            </div>


            <div id="type" style=" margin-top: 8px;" class="form-group  col-md-5 col-sm-12 col-xs-12 col">
                <div id="net_tesvik">
                    <label for="exampleInputPassword1"> Teşvik Net Ücret(Aylık)</label>
                </div>
                <div id="tesvik_yuzdelik">
                    <label for="exampleInputPassword1">Tesvik Yüzdelik</label>
                </div>
                <div id="type">
                    <input type="number" name="tesvik_money" class="form-control"></div>
            </div>

            <input type="hidden" class="form-control" name="offer_amount" value="1">
            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">KDV</label>
                <select name="kdv" class="form-control">
                    <option value="KDV DAHİL">KDV DAHİL</option>
                    <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>
                </select>
            </div>

            <div style="margin-top: 15px;" class="form-group form-group col-md-5 col-sm-3 col-xs-12 col">
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
    </div>
    <!--bodrolama bitiş-->


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {

                    if ($(this).attr("value") == "bordro_ucret") {
                        $("#basi_ucret").show();
                        $("#net_ucrett").hide();
                        $("#bordro_type").show();

                    }

                    if ($(this).attr("value") == "net_ucret") {

                        $("#basi_ucret").hide();
                        $("#net_ucrett").show();
                        $("#bordro_type").show();
                    }
                    if ($(this).attr("value") == "seç") {

                        $("#basi_ucret").hide();
                        $("#net_ucrett").hide();
                        $("#bordro_type").hide();
                    }
                    if ($(this).attr("value") == "net_ucret_tesvik") {
                        $("#tesvik_yuzdelik").hide();
                        $("#net_tesvik").show();
                        $("#type").show();
                    }
                    if ($(this).attr("value") == "yuzdelik_ucret_tesvik") {
                        $("#tesvik_yuzdelik").show();
                        $("#net_tesvik").hide();
                        $("#type").show();
                    }
                    if ($(this).attr("value") == "Ücretsiz") {
                        $("#tesvik_yuzdelik").hide();
                        $("#net_tesvik").hide();
                        $("#type").hide();
                    }
                    if ($(this).attr("value") == "null") {
                        $("#tesvik_yuzdelik").hide();
                        $("#net_tesvik").hide();
                        $("#type").hide();
                    }
                });
            }).change();
        });
    </script>

@endsection
@section('css')@endsection
@section('js')@endsection
