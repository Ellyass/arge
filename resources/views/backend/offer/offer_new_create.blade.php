@extends('backend.layout')
@section('content')

    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border"></div>
            <div class="box-body">

                <div id="bos" style="margin-left: 20px;">
                    <p><strong>Hangi Teklifi Yüklemek İstersiniz ?</strong></p>
                </div>

    <div class="form-group " align="right">
    <div class="col-md-10 col-xs-12" style="margin-left: 70px;">
        <label for="" style="" class="col-sm-10 col-xs-12 col-md-6 ">Yeni Sistem</label>
        <select  class="form-control" type="offer_type">
            <option value="">Seçiniz</option>
            <option value="{{route('tesvik_create',1)}}">Teşvik</option>
            <option value="{{route('kvkk_create',2)}}">Kvkk</option>
            <option value="{{route('bordrolama_create',3)}}">Bordrolama</option>
            <option value="{{route('ikmetrik_create',4)}}">İkmetrik</option>
            <option value="{{route('performans_create',5)}}">Performans</option>
            <option value="{{route('danismanlik_create',6)}}">Danışmanlık</option>
            <option value="{{route('danismanlik_create',7)}}">Eğitim</option>
            <option value="{{route('iys_create',8)}}">İYS Danışmanlık</option>
            <option value="{{route('mesem_create',9)}}">Mesem Teşvik</option>
            <option value="{{route('ebordro_create',10)}}">E-Bordro</option>
            <option value="{{route('dtesvik_create',11)}}">D-Teşvik</option>
            <option value="{{route('dkvkk_create',12)}}">D-Kvkk</option>
        </select>
        <button class="git">Git</button>
    </div>
    </div>
            </div>

            <div class="form-group"></div>
        </div>
    </section>

    <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(".git").click(function ()
        {
            var url =   $('select[type=offer_type] option').filter(':selected').val();
            window.location.href = url;
        });
          console.log(url);
    </script>



    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
@section('css')@endsection
@section('js')@endsection
