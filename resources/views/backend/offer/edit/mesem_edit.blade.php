@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border"></div>
            <div class="box-body">

                <div id="mesemtesvik">
                    <form action="{{route('offer_update')}}" method="POST" enctype="multipart/form-data">
                        @csrf

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

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">İş başı Eğitim</label>
                            <select class="form-control" name="egitim">
                                <option selected value="var">Eğitim Maddesi Var</option>
                                <option selected value="yok">Eğitim Maddesi Yok</option>
                            </select>
                        </div>


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Sabit Ücret/Yüzdelik</label>
                            <select class="form-control" name="accept_type">
                                <option selected value="null">Seçiniz</option>
                                <option value="Aylık">Aylık Ücret</option>
                                <option value="Yüzdelik">Yüzdelik Değer</option>
                            </select>
                        </div>

                        <input type="hidden" name="product" value="13">
                        <input type="hidden" name="new_tesvik_offer" value="new_tesvik">


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">KDV</label>
                            <select name="kdv" class="form-control">
                                <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                                <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
                            </select>
                        </div>


                        <input type="hidden" name="offer_amount" class="form-control" value="1">

                        <div id="tesvik_s_m" class="form-group col-md-5 col-sm-3 col-xs-12 col">

                            <div id="sabit" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Sabit Ücret : </label>
                            </div>

                            <div id="yuzdelik" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Yüzdelik Oranı : </label>
                            </div>

                            <div class="form-group col-md-6 col-sm-3 col-xs-12 col">
                                <input type="number" name="offer_money" minlength="1" maxlength="100"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                            <input type="date" name="offer_date" class="form-control">
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
                <!-- Mesem Bitiş-->

            </div>
        </div>
    </section>

    <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {
                    if ($(this).attr("value") == "Aylık") {
                        $("#sabit").show();
                        $("#yuzdelik").hide();
                        $("#tesvik_s_m").show();
                    }
                    if ($(this).attr("value") == "Yüzdelik") {
                        $("#sabit").hide();
                        $("#yuzdelik").show();
                        $("#tesvik_s_m").show();
                    }
                    if ($(this).attr("value") == "null") {
                        $("#sabit").hide();
                        $("#yuzdelik").hide();
                        $("#tesvik_s_m").hide();
                    }
                });
            }).change();
        });
    </script>
    <!--mesem-->

@endsection
@section('css')@endsection
@section('js')@endsection
