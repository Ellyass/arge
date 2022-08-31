@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">


                <form action="{{route('offer_jquery')}}" method="POST">
                    @csrf
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 col">
                        <select class="form-control" name="mounth">
                            <option value="">Seçiniz</option>
                            <option value="1">Ocak Ayı</option>
                            <option value="2">Şubat Ayı</option>
                            <option value="3">Mart Ayı</option>
                            <option value="4">Nisan Ayı</option>
                            <option value="5">Mayıs Ayı</option>
                            <option value="6">Haziran Ayı</option>
                            <option value="7">Temmuz Ayı</option>
                            <option value="8">Ağustos Ayı</option>
                            <option value="9">Eylül Ayı</option>
                            <option value="10">Ekim Ayı</option>
                            <option value="11">Kasım Ayı</option>
                            <option value="12">Aralık Ayı</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-3 col-xs-12 col">
                        <select class="form-control" name="year">
                            <option value="">Seçiniz</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2022">2023</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-3 col-xs-12 col">
                        <select class="form-control" name="product">
                            <option value="">Seciniz</option>
                            <option value="Teşvik">Teşvik</option>
                            <option value="Kvkk">Kvkk</option>
                            <option value="Eğitim">Eğitim</option>
                            <option value="Bordroloma">Bordroloma</option>
                            <option value="Danışmanlık">Danışmanlık</option>
                            <option value="İkmetrik">İkmetrik</option>
                            <option value="İys Danışmanlık">İys Danışmanlık</option>
                            <option value="Yazılım">YAZILIM</option>
                            <option value="Performans">PERFORMANS</option>
                            <option value="ebordro">E-BORDRO</option>
                            <option value="dijitajkvkk">Dijital KVKK</option>
                            <option value="dijital">Dijital TEŞVİK</option>
                            <option value="mesem">Mesem TEŞVİK</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-3 col-xs-12 col">
                        <select class="form-control" name="status">
                            <option value="">Seçiniz</option>
                            <option value="2">Kabul Edildi</option>
                            <option value="1">Bekleniyor</option>
                            <option value="0">Reddedildi</option>

                        </select>
                    </div>

                    <div class="form-group col-md-1 col-sm-3 col-xs-12 col">
                        <button class="btn btn-success ">Sorgula</button>
                    </div>
                </form>
            </div>


            <div class="box-body">
                <table class="table" id="paginationNumber" class="display nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Firma</th>
                        <th>Teklif Tarihi</th>
                        <th>Teklif Toplamı</th>
                        <th>Teklif Türü</th>
                        <th>Satıcı</th>
                        <th>Teklif Açıklama</th>
                        <th>Müşteri Düzenle</th>
                        <th>Teklif Durumu</th>
                        <th>Teklif Dosya/Güncelle</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($offers))
                        <?php $say = 1;?>
                    @endif
                    @foreach($offers as $offer)
                        <tr>
                            <td scope="row"><?php echo $say++ ?></td>

                            <td>{{!empty($offer->customer->name) ? $offer->customer->name : null}}</td>

                            <td>{{$offer->offer_date->format('d.m.Y')}}</td>

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

                            <td>{{$offer->tproduct->name}}</td>

                            <td>{{!empty($offer->target_seller_id) ? $offer->seller->seller_name : ''}}</td>

                            <td>
                           <textarea>
                               @foreach($offer->explanations as $explanation)
                                   {{date('d.m.Y',strtotime($explanation->date)).'/'.$explanation->explanation}}
                               @endforeach
                           </textarea>
                            </td>

                            <td>
                                <a href="{{route('customer_edit',['id'=>$offer->customer_id])}}">
                                    <button class="btn btn-info btn-xs">Müşteri Düzenle</button>
                                </a>
                            </td>

                            <td>@if($offer->offer_status==1)
                                    <a href="{{route('offer_status',['id'=>$offer->id])}}">
                                        <button class="btn btn-warning btn-xs">Bekleniyor</button>
                                    </a>

                                @elseif($offer->offer_status==2)
                                    <a href="{{route('offer_status',['id'=>$offer->id])}}">
                                        <button class="btn btn-success btn-xs">Kabul Edildi</button>
                                    </a>

                                @elseif($offer->offer_status==0)
                                    <button class="btn btn-danger btn-xs">Reddedildi</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('offer_edit',['id'=>$offer->id])}}">
                                    <button class="btn btn-success btn-sm">Güncelle</button>
                                </a>
                                {{--                           <a href="{{route('contract_upload',['id'=>$offer->id])}}"><button class="btn btn-primary btn-xs">Sözleşme Yükle</button></a>--}}
                                <a href="{{route('offer_delete',['id'=>$offer->id])}}">
                                    <Button class="btn btn-danger btn-sm "><span class="fa fa-trash"></span></Button>
                                </a>
                                {{--                           <a href="{{route('offer_file',['id' => $offer->id])}}"><img src="https://img.icons8.com/officel/40/000000/pdf.png"/></a>--}}
                                <a href="{{route('offer_file',['id' => $offer->id])}}"><i
                                        class="fa fa-file-o btn btn-primary btn-sm"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>


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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>

    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': false,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true
            })
        })

    </script>

    <script>
        $(document).ready(function () {
            $('#paginationNumbers').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy'
                ]
            });
        });
    </script>

@endsection
@section('css')@endsection
@section('js')@endsection

