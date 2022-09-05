@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <form action="{{route('offer_agreement_post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$offer->customer_id}}" name="customer_id">
                    <input type="hidden" value="{{$offer->id}}" name="offer_id">

                    <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                        <label for="exampleInputPassword1">Teklif Dosyası </label>
                        <input type="file" name="offer_file" class="form-control">
                    </div>

                    <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                        <button class="btn btn-success">Kaydet</button>
                    </div>

                </form>
            </div>
        </div>
    </section>


    <link href="/Backend/netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">
    <script src="/Backend/netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/Backend/code.jquery.com/jquery-1.11.1.min.js"></script>

@endsection
@section('css')@endsection
@section('js')@endsection
