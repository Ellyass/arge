@extends('backend.layout')
@section('content')
    <div id="ikmetrik">

        <div style="margin-left: 10px;">
            <strong>İKMETRİK</strong>
        </div>
        <br>

        <form action="{{route('ikmetrik_post')}}" method="POST">
            @csrf
            <div class="form-group col-md-6 col-sm-3 col-xs-12">
                <label for="exampleInputPassword1">Firma Seciniz</label>
                <select class="form-control" name="customer_id">
                    @foreach($customers as $customer )
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="product" value="6">

            <div class="form-group col-md-6 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                <select class="form-control" name="target_Seller_id">
                    @foreach($sellers as $seller)
                        <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6 col-sm-3 col-xs-12">
                <label for="exampleInputPassword1">Anlaşma Türü</label>
                <select class="form-control" name="accept_type">
                    <option value="null">Seçiniz</option>
                    <option value="Aylık">Aylık</option>
                    <option value="Yıllık">Yıllık</option>
                </select>
            </div>

            <div class="form-group col-md-6 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">İlgili Alıcı</label>
                <input type="text" name="alici" class="form-control">
            </div>

            <div id="month" class="form-group col-md-6 col-sm-3 col-xs-12">
                <label for="exampleInputPassword1">Aylık</label>
                <select class="form-control" name="month">
                    <option selected value="">Seçiniz</option>
                    <option value="50">0-20</option>
                    <option value="5">21-300</option>
                    <option value="4">301-1000</option>
                    <option value="2">1001-5000</option>
                    <option value="1">5000+</option>
                </select>

                <div style="margin-top: 10px; margin-right: 15px;" class="col-md-6 col-sm-3 col-xs-12">
                    <label for="">Belirlenen Ücreti Giriniz</label>
                    <input class="form-control" type="number" name="month_free">
                </div>
            </div>

            <div id="year" class="form-group col-md-6 col-sm-3 col-xs-12">
                <label for="exampleInputPassword1">Yıllık</label>
                <select class="form-control" name="year">
                    <option selected value="">Seçiniz</option>
                    <option value="40">0-20</option>
                    <option value="4">21-300</option>
                    <option value="3.2">301-1000</option>
                    <option value="100000">1001-5000</option>
                    <option value="1">5000+</option>
                </select>

                <div style="margin-top: 10px;" class="col-md-6 col-sm-3 form-group">
                    <label for="">Belirlenen Ücreti Giriniz</label>
                    <input class="form-control" type="number" name="year_free">
                </div>
            </div>

            <div class="form-group col-md-6 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                <input type="date" name="offer_date" class="form-control" required>
            </div>

            <input type="hidden" name="kdv" value="0">

            <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                <label for="exampleInputPassword1">Açıklama Giriniz</label>
                <input type="text" name="explanation" class="form-control">
            </div>


            <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                <textarea class="form-control" id="summary_ckeditor" name="summary_ckeditor"></textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            </div>


            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                <button class="btn btn-primary">Word Oluştur</button>
            </div>
        </form>
    </div>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace('summary_ckeditor');</script>


    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {

                    if ($(this).attr("value") == "Aylık") {
                        $("#month").show();
                        $("#year").hide();
                    }
                    if ($(this).attr("value") == "Yıllık") {

                        $("#month").hide();
                        $("#year").show();
                    }
                    if ($(this).attr("value") == "null") {
                        $("#month").hide();
                        $("#year").hide();
                    }
                });
            }).change();
        });
    </script>

@endsection
@section('css')@endsection()
@section('js')@endsection()
