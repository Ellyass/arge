@extends('backend.layout')
@section('content')

    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border"></div>
            <div class="box-body">

                <div id="dlkvkk">

                    <div class="container container-fluid">
                        <form action="{{route('offer_update')}}" method="POST">
                            @csrf


                            <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                            <input type="hidden" name="offer_id" value="{{$offer->id}}">
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
                                    <option value="Sucret">Seçiniz</option>
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
                                    <input type="number" name="offer_money" minlength="1" maxlength="100"
                                           class="form-control">
                                </div>
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
                                <button class="btn btn-success">Teklif Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--dkvkk bitiş-->
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
                        $("#L_aylik").show();
                        $("#L_yillik").hide();
                        $("#dkvkk_s_y").show();
                    }
                    if ($(this).attr("value") == "Yıllık") {
                        $("#L_aylik").hide();
                        $("#L_yillik").show();
                        $("#dkvkk_s_y").show();
                    }
                    if ($(this).attr("value") == "seç") {
                        $("#L_aylik").hide();
                        $("#L_yillik").hide();
                        $("#dkvkk_s_y").hide();
                    }
                });
            }).change();
        });
    </script>
    <!--dkvkk-->

@endsection
@section('css')@endsection
@section('js')@endsection
