@extends('backend.layout')
@section('content')

    <section class="content-header" >
        <div class="box box-success"  >
            <div class="box-header with-border">
                <h3>Müşteri Güncelleme</h3>
            </div>


            <div class="box-body">
                    <form action="{{route('email_update',['id' => $email->id] )}}" method="POST">

                    @csrf
                    <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12" >Firma Adı <span class="required"></span></label>
                        <input type="text" name="name"  class="form-control" value="{{$customers->name}}" readonly>
                        <input type="hidden" name="customer_id"  class="form-control" value="{{$customers->id}}">
                    </div>


                    <div class="form-group" >
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12" >Firma Yetkilisi <span class="required"></span>
                        </label>
                        <input type="text" name="customer_official" value="{{$email->customer_official}}"  required="required" class="form-control">
                    </div>


                    <div class="form-group" >
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12" >Cep<span class="required"></span>
                        </label>
                        <input type="number" maxlength="10" name="mobile" value="{{$email->mobile}}"  required="required" class="form-control">
                    </div>


                    <div class="form-group" >
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Sabit Telefon<span class="required"></span>
                        </label>
                        <input type="number" name="phone" value="{{$email->phone}}"  required="required" class="form-control">
                    </div>


                    <div class="form-group" >
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12" >E-Mail <span class="required"></span>
                        </label>
                        <input type="email" name="email" value="{{$email->email}}" required="required" class="form-control">
                    </div>


                    <br>
                    <br>
                    <hr>

                        <div class="form-group">
                            <div class="col-md-9 col-sm-5 col-xs-12">
                                <a href="{{route('email_Index')}}"><button class="btn btn-danger">Vazgeç</button></a>
                                <a href=""><button type="submit" class="btn btn-success">Güncelle</button></a>
                            </div>
                        </div>

                    <br>
                </form>
            </div>
        </div>


    </section>
    <link href="/Backend/netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="/Backend/netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/Backend/code.jquery.com/jquery-1.11.1.min.js"></script>

@endsection
@section('css')@endsection
@section('js')@endsection



