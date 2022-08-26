@extends('backend.layout')
@section('content')
    <div style="margin-left: 10px;">
        <strong>TEŞVİK</strong>
    </div>
    <br>
    <div class="form-group">

        <div id="tesvik">
            <form action="{{route('tesvik_post')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group col-md-10 col-sm-3 col-xs-12">
                    <label for="exampleInputPassword1">Firma Seciniz</label>
                    <select class="form-control selectpicker" name="customer_id" data-live-search="true">
                        @foreach($customers as $customer )
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
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
                    <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                    <select class="form-control" name="target_Seller_id">
                        @foreach($sellers as $seller)
                            <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                    <label for="exampleInputPassword1">Sabit Ücret/Yüzdelik</label>
                    <select class="form-control" name="accept_type">
                        <option selected value="Sucret">Seçiniz</option>
                        <option value="Aylık">Aylık Ücret</option>
                        <option value="Yüzdelik">Yüzdelik Değer</option>
                    </select>
                </div>

                <input type="hidden" name="product" value="1">
                <input type="hidden" name="new_tesvik_offer" value="new_tesvik">


                <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                    <label for="exampleInputPassword1">KDV</label>
                    <select name="kdv" class="form-control">
                        <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                        <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
                    </select>
                </div>


                <input type="hidden" name="offer_amount" class="form-control" value="1">

                <div id="tesvik_s_y" class="form-group col-md-5 col-sm-3 col-xs-12 col">

                    <div id="L_sabit" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                        <label for="exampleInputPassword1">Sabit Ücret : </label>
                    </div>
                    <div id="L_yuzdelik" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                        <label for="exampleInputPassword1">Yüzdelik Oranı : </label>
                    </div>
                    <div class="form-group col-md-6 col-sm-3 col-xs-12 col">
                        <input type="number" name="offer_money" minlength="1" maxlength="100" class="form-control">
                    </div>
                </div>


                <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                    <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                    <input type="date" name="offer_date" class="form-control" required>
                </div>

                <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                    <label for="exampleInputPassword1">Açıklama Giriniz</label>
                    <input type="text" name="explanation" class="form-control">
                </div>
                {{--        <div class="container">--}}
                {{--            <div class="row">--}}
                {{--                <div class="col-md-12">--}}
                {{--                    <div data-role="dynamic-fields">--}}
                {{--                        <div class="form-inline">--}}
                {{--                            <div class="form-group">--}}
                {{--                                <label class="sr-only" for="field-name">Not Ekleme</label>--}}
                {{--                                <input type="text" name="not" class="form-control" id="field-name" placeholder="Not Yazınız">--}}
                {{--                            </div>--}}

                {{--                            <button class="btn btn-danger" data-role="remove">--}}
                {{--                                <span class="glyphicon glyphicon-remove"></span>--}}
                {{--                            </button>--}}
                {{--                            <button class="btn btn-primary" data-role="add">--}}
                {{--                                <span class="glyphicon glyphicon-plus"></span>--}}
                {{--                            </button>--}}
                {{--                        </div>  <!-- /div.form-inline -->--}}
                {{--                    </div>  <!-- /div[data-role="dynamic-fields"] -->--}}
                {{--                </div>  <!-- /div.col-md-12 -->--}}
                {{--            </div>  <!-- /div.row -->--}}
                {{--        </div>--}}

                <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                    <button class="btn btn-primary ">Word Oluştur</button>
                </div>
            </form>

            {{--    <a href="{{ route('document_wordtopdf')}}"><button class="btn btn-danger">Pdf Çevir</button></a>--}}

        </div>
    </div>
    <!--teşvik bitiş-->

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {
                    if ($(this).attr("value") == "Aylık") {
                        $("#L_sabit").show();
                        $("#L_yuzdelik").hide();
                        $("#tesvik_s_y").show();
                    }
                    if ($(this).attr("value") == "Yüzdelik") {
                        $("#L_sabit").hide();
                        $("#L_yuzdelik").show();
                        $("#tesvik_s_y").show();
                    }
                    if ($(this).attr("value") == "Sucret") {
                        $("#L_sabit").hide();
                        $("#L_yuzdelik").hide();
                        $("#tesvik_s_y").hide();
                    }
                });
            }).change();
        });
    </script>

@endsection
@section('css')@endsection
@section('js')@endsection
