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
                <th scope="col">Müşteri Durumu</th>
                <th scope="col">Birim Fiyatı</th>
                <th scope="col">Dış Kaynak/Satışçı</th>
                <th scope="col">Not</th>
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

                </form></td>
                    @if($offer->accept_type=='Aylık')
                        <td>{{number_format($offer->offer_money,2,',','.').' ₺'}}</td>
                    @elseif(
                $offer->product == 2 or
                $offer->product == 3 or
                $offer->product == 4 or
                $offer->product == 5 or
                $offer->product == 6 or
                $offer->product == 7 or
                $offer->product == 8 or
                $offer->product == 9 or
                $offer->product == 10 or
                $offer->product == 11 or
                $offer->product == 12)
                        <td>{{number_format($offer->offer_money,2,',','.').' ₺'}}</td>
                    @else
                        <td>{{'% '.number_format($offer->offer_total,2,',','.')}}</td>
                    @endif
                <td>{{$offer->seller->seller_name}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Not al
                    </button>

                    <!-- Modal -->
                    <form action="{{route('not_post')}}" method="POST">
                            @csrf

                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel"><strong>Arama Notları</strong>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @if(isset($call))
                                        @php
                                        $arama=1;
                                        @endphp

                                    <div>
                                        @foreach($call as $cal)
                                            <input class="form-control" type="text" value="{{$arama++. '.Arama: '}} {{$cal->call_explanation}}">
                                             <br>
                                        @endforeach
                                    </div>
                                    @endif
                                    <br>

                                    <div class="modal-body">
                                        <textarea name="call_explanation" id="call_explanation" cols="70" rows="1"></textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat
                                        </button>
                                        <button type="submit" class="btn btn-primary">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
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
                    <td><?php echo $sayi++; ?></td>
                    <td>{{date('d.m.Y', strtotime($offer->offer_date)) }}</td>
                    <td><a href="{{!empty($file->offer_file) ? url($file->offer_file)  :  ''}}"><img src="https://img.icons8.com/officel/40/000000/word.png"/></a>
                    <td><a href="{{!empty($offer->pdfs->offer_pdf) ? url($offer->pdfs->offer_pdf) : ''}}" download=""><img src="https://img.icons8.com/officel/40/000000/pdf.png"/></a></td>

                    <form id="offerDelete" action="{{route('detail_offer_delete',['id'=>$file->id])}}" method="POST">

                        @csrf
                        <td>
                            <button data-id="{{$file->id}}" class="btn btn-danger">Sil</button>
                        </td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    function formgonder(check_value, column) {
        var value = $(check_value).attr('value');
        var id = {{$id = $offer->id}};
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({


            url: '/offer/ajax/cron',
            type: "POST",
            data: {value: value, column: column, id: id},
            success: function (gelen_cevap) {
                alert(gelen_cevap);
                $(check_value).prop('disabled', true);
            },
            error: function () {
                alert("hata");
            }
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link r href="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js">
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<link href="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js">
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/1.1.1/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



@section('css')@endsection
@section('js')@endsection
