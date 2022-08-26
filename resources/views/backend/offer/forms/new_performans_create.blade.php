@extends('backend.layout')
@section('content')

<div id="performans">

    <div style="margin-left: 10px;">
        <strong>PERFORMANS</strong>
    </div>
    <br>
    <div class="container container-fluid">
        <form action="{{route('performans_post')}}" method="POST">
            @csrf

            <div class="container">
                    <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="">Firma Seç</label>
                            <select class="selectpicker select2 form-control" name="customer_id" data-live-search="true" id="">
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                    </div>

                    <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="">Pazarlamacı Seç</label>
                            <select class="form-control" name="target_Seller_id" >
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                    </div>


                    <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >
                        <label for="exampleInputPassword1">Sabit/Yıllık Ücret</label>
                        <select class="form-control" name="accept_type" >
                            <option selected value="Sucret">Seçiniz</option>
                            <option value="Aylık">Aylık Ücret</option>
                            <option value="Yıllık">Yıllık Ücret</option>
                        </select>
                    </div>

                <input type="hidden" name="product" value="9">
                <input type="hidden" name="new_performans_offer" value="new_performans">


                    <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                        <div class="form-group">
                            <label for="">Çalışan Sayısı</label>
                            <input type="number" class="form-control" name="employee_count" required>
                        </div>
                    </div>


                <input type="hidden" name="offer_amount" class="form-control" value="1">

                <div id="performans_s_y" class="form-group col-md-5 col-sm-3 col-xs-12 col"  >

                    <div id="L_aylik" class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
                        <label for="exampleInputPassword1">Aylık Ücret : </label>
                    </div>

                    <div id="L_yillik" class="form-group col-md-5 col-sm-3 col-xs-12 col"  >
                        <label for="exampleInputPassword1">Yıllık Oranı : </label>
                    </div>

                    <div class="form-group col-md-6 col-sm-3 col-xs-12 col"  >
                        <input type="number" name="offer_money" minlength="1" maxlength="100" class="form-control">
                    </div>
                </div>


                    <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="">KDV</label>
                            <select name="kdv"  class="form-control">
                                <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                                <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
                            </select>
                    </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                            <input type="date" name="offer_date" class="form-control" required>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>

            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                <button  class="btn btn-primary">word Oluştur</button>
            </div>

            </div>
        </form>
    </div>
</div>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    $(document).ready(function(){
        $("select").change(function(){
            $( "select option:selected").each(function(){
                if($(this).attr("value")=="Aylık"){
                    $("#L_aylik").show();
                    $("#L_yillik").hide();
                    $("#performans_s_y").show();
                }
                if($(this).attr("value")=="Yıllık"){
                    $("#L_aylik").hide();
                    $("#L_yillik").show();
                    $("#performans_s_y").show();
                }
                if($(this).attr("value")=="Sucret"){
                    $("#L_aylik").hide();
                    $("#L_yillik").hide();
                    $("#performans_s_y").hide();
                }
            });
        }).change();
    });
</script>


@endsection
@section('css')@endsection
@section('js')@endsection
