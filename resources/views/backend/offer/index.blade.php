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
                            <option value="1">Teşvik</option>
                            <option value="2">Kvkk</option>
                            <option value="3">Eğitim</option>
                            <option value="4">Bordroloma</option>
                            <option value="5">Danışmanlık</option>
                            <option value="6">İkmetrik</option>
                            <option value="7">İys Danışmanlık</option>
                            <option value="9">PERFORMANS</option>
                            <option value="10">E-BORDRO</option>
                            <option value="11">Dijital KVKK</option>
                            <option value="12">Dijital TEŞVİK</option>
                            <option value="13">Mesem TEŞVİK</option>
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

                <div class="form-group col-md-1 col-sm-3 col-xs-12 col">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"
                            id="open">Rapor Oluştur
                    </button>
                </div>
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
                                <a href="{{route('offer_edit',['id'=>$offer->id,'case'=>$offer->product])}}">
                                    <button class="btn btn-success btn-sm">Güncelle</button>
                                </a>
                                <a href="{{route('offer_delete',['id'=>$offer->id])}}">
                                    <Button class="btn btn-danger btn-sm "><span class="fa fa-trash"></span></Button>
                                </a>
                                <a href="{{route('offer_agreement',['id' => $offer->id])}}"><button class="btn btn-primary btn-sm">Sözleşme Yükle</button></a>

                                <a href="{{route('offer_file',['id' => $offer->id])}}"><i
                                        class="fa fa-file-o btn btn-primary btn-sm"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container">

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Teklif Raporu Al</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('teklif.teklifReport')}}" method="POST">
                                    @csrf
                                    <div class="form-group col-md-12">

                                        <div class="col-md-6">
                                            <label for="first_date">Başlangıç Tarihi:</label>
                                            <input type="date" class="form-control" name="first_date" id="first_date">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="last_date">Bitiş Tarihi:</label>
                                            <input type="date" class="form-control" name="last_date" id="last_date">
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="form-group col-xl-12">
                                            <label for="statu">Teklif Durumu:</label>
                                            <select class="js-example-basic-multiple form-control" style="width: 100%"
                                                    name="status[]" multiple>
                                                <option value="0" selected>Reddilen</option>
                                                <option value="1" selected>Bekleyen</option>
                                                <option value="2" selected>Kabul Edilen</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="form-group col-xl-12">
                                            <label for="type">Teklif Türü:</label>
                                            <select class="js-example-basic-multiple form-control" style="width: 100%" name="types[]" multiple>
                                                <option value="1">TEŞVİK</option>
                                                <option value="2">KVKK</option>
                                                <option value="3">EĞİTİM</option>
                                                <option value="4">BORDROLAMA</option>
                                                <option value="5">DANIŞMANLIK</option>
                                                <option value="6">İKMETRİK</option>
                                                <option value="7">İYS DANIŞMANLIK</option>
                                                <option value="9">PERFORMANS</option>
                                                <option value="10">E-BORDRO</option>
                                                <option value="11">DİJİTAL KVKK</option>
                                                <option value="12">DİJİTAL TEŞVİK</option>
                                                <option value="13">MESEM TEŞVİK</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç
                                        </button>
                                        <button type="submit" class="btn btn-success">Rapor Al</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <link href="/Backend/netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">
    <script src="/Backend/netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/Backend/code.jquery.com/jquery-1.11.1.min.js"></script>

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

    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endsection
@section('css')@endsection
@section('js')@endsection

