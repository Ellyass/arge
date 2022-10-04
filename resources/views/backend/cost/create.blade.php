@extends('backend.layout')
@section('content')

    <section class="content-header" >
        <div class="box box-primary"  >
            <div class="box-header with-border" style="background-color: #fff" >
                <h4 style="">Kullanıcı Masraf Oluşur</h4>
            </div>
            <div class="box-body">
                <form action="{{route('cost_create')}}" method="POST">
                    @csrf
                    <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >
                        <label for="exampleInputPassword1">Kullanıcı</label>
                        <select name="user_id" class="form-control">
                            @foreach($costs as $cost)
                                <option value="{{$cost->user->user_id}}">{{$cost->user->user_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >
                        <label for="exampleInputPassword1">Aldığı Miktar</label>
                        <input type="text" name="cost_money" class="form-control">
                    </div>


                    <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >
                        <label for="exampleInputPassword1">Tarih</label>
                        <input type="date" name="cost_date" class="form-control">
                    </div>

                    <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >
                        <label for="exampleInputPassword1">Sebep</label>
                        <input type="text" name="cost_explanation" class="form-control">
                    </div>

                    <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right" >
                        <button class="btn btn-success">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('css')@endsection
@section('js')@endsection

