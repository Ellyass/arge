@extends('backend.layout')
@section('content')

    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border"></div>
            <div class="box-body">

                <div id="Bordrolama">
                    <form action="{{route('offer_update')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
                        <input type="hidden" name="product" value="4">

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="new_bordrolama">

                            <div class="col-md-5 col-sm-3 col-xs-12">
                                <label for="exampleInputPassword1">Bordro Ücreti</label>
                                <select class="form-control col-md-5 col-sm-3 col-xs-12 newBordroUcret "
                                        name="bordro_type">
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
                                    <option value="net_tesvik">Net Ücret</option>
                                    <option value="yuzdelik_tesvik">Yüzdelik</option>
                                </select>
                            </div>

                            <div id="bordro_type" style=" margin-top: 10px;"
                                 class="form-group  col-md-5 col-sm-3 col-xs-12 col">
                                <div id="net_ucrett">
                                    <label for="exampleInputPassword1">Net Ücret(Aylık)</label>
                                </div>

                                <div id="basi_ucret">
                                    <label for="exampleInputPassword1">Bordro Başı</label>
                                </div>
                                <div>
                                    <input type="number" name="offer_money" class="form-control">
                                </div>
                            </div>

                            <div id="type" style=" margin-top: 8px;"
                                 class="form-group  col-md-5 col-sm-12 col-xs-12 col">
                                <div id="net_tesvik">
                                    <label for="exampleInputPassword1"> Teşvik Net Ücret(Aylık)</label>
                                </div>
                                <div id="yuzdelik_tesvik">
                                    <label for="exampleInputPassword1">Tesvik Yüzdelik</label>
                                </div>
                                <div id="type">
                                    <input type="number" name="tesvik_money" class="form-control">
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="offer_amount" value="1">
                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">KDV</label>
                                <select name="kdv" class="form-control">
                                    <option value="KDV DAHİL">KDV DAHİL</option>
                                    <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>
                                </select>
                            </div>

                            <div style="margin-top: 15px;"
                                 class="form-group form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                                <input type="date" required name="offer_date" class="form-control">
                            </div>

                            <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Açıklama Giriniz</label>
                                <input type="text" name="explanation" class="form-control">
                            </div>

                            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                                <button class="btn btn-success">Teklifi Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--bodrolama bitiş-->

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
                    if ($(this).attr("value") == "net_tesvik") {
                        $("#yuzdelik_tesvik").hide();
                        $("#net_tesvik").show();
                        $("#type").show();
                    }
                    if ($(this).attr("value") == "yuzdelik_tesvik") {
                        $("#yuzdelik_tesvik").show();
                        $("#net_tesvik").hide();
                        $("#type").show();
                    }
                    if ($(this).attr("value") == "Ücretsiz") {
                        $("#tesvik_yuzdelik").hide();
                        $("#net_tesvik").hide();
                        $("#type").hide();
                    }
                    if ($(this).attr("value") == "null") {
                        $("#yuzdelik_tesvik").hide();
                        $("#net_tesvik").hide();
                        $("#type").hide();
                    }
                });
            }).change();
        });
    </script>
    <!--bordro-->

@endsection
@section('css')@endsection
@section('js')@endsection
