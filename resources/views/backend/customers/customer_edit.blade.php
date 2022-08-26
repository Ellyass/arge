@extends('backend.layout')
@section('content')

    <section class="content-header" >
        <div class="box box-success"  >
            <div class="box-header with-border">
                <h3>Müşteri Güncelleme</h3>
            </div>
            <div class="box-body">
                <form action="{{route('customer_update',['id' => $edit->id] )}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12" >Firma Adı <span class="required"></span></label>
                        <input type="text" name="name"  required="required" class="form-control" value="{{$edit->name}}">
                    </div>

                    <div class="form-group" >
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12" >Firma Adresi <span class="required"></span>
                        </label>
                        <input type="text" name="address" value="{{$edit->address}}"  required="required" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label  class="control-label  col-xs-12" > Müşteri Durumu  <span class="required"></span>
                        </label>
                        <select class=" form-control " name="status" >
                            @foreach(config('variables.customers.status') as $key => $status)
                                <option @if($edit->status==$status) selected @endif value="{{ $key }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4" >
                        <label  class="control-label  col-xs-12" > Müşteri Türü  <span class="required"></span></label>
                        @php $a = [];
                            foreach($edit->customer_types as $customer_type) {
                                $a[] =  $customer_type->type;
                            }
                        @endphp
                        <select class="js-example-basic-multiple form-control"  name="customer_type_id[]" multiple="multiple">
                            @foreach(config('variables.customers.types') as $key => $type)
                                <option
                                    @if(in_array($key, $a)) selected @endif value="{{ $key }}">{{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <br>
                    <hr>

                    <div class="form-group">
                        <div class="col-md-9 col-sm-5 col-xs-12">
                            <a href="{{route('customer_Index')}}"><button type="submit" class="btn btn-danger">Vazgeç</button></a>
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>


@endsection
@section('css')@endsection
@section('js')@endsection



