@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary"></div>
            <div class="box-header with-border"></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Firma</th>
                        <th scope="col">Teklif Veren</th>
                        <th>Müşteri Durumu</th>
                        <th scope="col">Birim Fiyatı</th>
                        <th scope="col">Dış Kaynak/Satışçı</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>{{$offer->customer->name}}</td>
                        <td>{{$offer->user->name}}</td>
                        @if($offer->offer_status==2)
                            <td>Kabul Edildi</td>
                        @elseif($offer->offer_status==1)
                            <td>Bekliyor</td>
                        @else
                            <td>Reddedildi</td>
                        @endif


                        <?php
                        if ($interval->days<1)
                        {
                        if ($offer->cron_1_day==1){ ?>
                        <input id="cron_1_day" checked disabled  type="checkbox" onclick="formgonder(this,'cron_1_day')"  name="" value="1">
                        <label >ilk arama</label><br>
                        <?php  }  else  {  ?>
                        <input id="cron_1_day"  type="checkbox" onclick="formgonder(this,'cron_1_day')"  name="" value="1">
                        <label >ilk arama</label><br>
                        <?php }
                        } ?>
                        <?php
                        if ($interval->days >=1 && $interval->days<=7)
                        {
                        if ($offer->cron_1_week==1){ ?>
                        <input id="cron_1_week" checked disabled type="checkbox" onclick="formgonder(this,'cron_1_week')" name="" value="1">
                        <label >2 arama</label><br>
                        <?php } else {?>
                        <input id="cron_1_week" type="checkbox" onclick="formgonder(this,'cron_1_week')" name="" value="1">
                        <label >2 arama</label><br>
                        <?php }
                        } ?>
                        <?php
                        if ($interval->days >=7 && $interval->days<=14){
                        if ($offer->cron_2_week==1){ ?>
                        <input type="checkbox" checked disabled  name="cron_2_week" onclick="formgonder(this,'cron_2_week')" value="1">
                        <label >3 arama</label>
                        <?php } else {?>

                        <input type="checkbox"  name="cron_2_week" onclick="formgonder(this,'cron_2_week')" value="1">
                        <label >3 arama</label>
                        <?php }}?>
                        </form></td>
                        <td>{{$offer->offer_money}}</td>
                        <td>{{$offer->seller->seller_name}}</td>
                    </tr>
                    </tbody>
                </table>

    <table class="table">
        <thead>
        <th>#</th>
        <th>Teklif Tarihi</th>
        <th>word</th>
        <th>PDF</th>
        <th>Sil</th>
        </thead>
        <tbody>
        <?php $sayi = 1;?>
        @foreach($offer->files as $file )
            <tr>
                <td><?php echo $sayi ++ ; ?></td>
                <td><?php echo date('d.m.Y',strtotime($offer->offer_date)) ?></td>
                <td><a href="{{ url($file->offer_file) }}"><img src="https://img.icons8.com/officel/40/000000/word.png"/></a>
                <td><a href="#"><img src="https://img.icons8.com/officel/40/000000/pdf.png"/></a></td>

                <form id="offerDelete{{$file->id}}" action="{{route('detail_offer_delete',['id'=>$file->id])}}" method="POST">
                    @csrf
                    <td><button data-id="{{$file->id}}" class="btn btn-danger">Sil</button></td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
    </section>

@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    function formgonder(check_value,column) {
        var value = $(check_value).attr('value');
        var id = <?php  echo $id =  $offer->id ?>;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({



            url: '/offer/ajax/cron',
            type: "POST",
            data: {value:value,column:column,id:id},
            success: function (gelen_cevap) {
                alert(gelen_cevap);
                $(check_value).prop('disabled',true);
            },
            error: function () {
                alert("hata");
            }
        });
    }
</script>

<script  src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script  src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link r href="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js">
<script  src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<link  href="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js">
<script  src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script  src="https://cdn.datatables.net/searchpanes/1.1.1/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



@section('css')@endsection
@section('js')@endsection
