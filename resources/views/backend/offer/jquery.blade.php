
@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <form action="{{route('offer_jquery')}}" method="POST">
                    @csrf
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 col" >
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
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 col" >
                        <select class="form-control" name="year">
                            <option value="">Seçiniz</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2022">2023</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 col" >
                        <select class="form-control" name="product">
                            <option value="">Seciniz</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 col" >
                        <select class="form-control" name="status">
                            <option value="">Seçiniz</option>
                            <option value="2">Kabul Edildi</option>
                            <option value="1">Bekleniyor</option>
                            <option value="0">Reddedildi</option>

                        </select>
                    </div>
                    <div class="form-group col-md-1 col-sm-3 col-xs-12 col" >
                        <button class="btn btn-success">Sorgula</button>
                    </div>
                </form>
            </div>
            <table class="table" id="paginationNumbers">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firma</th>
                    <th scope="col">Dış Kaynak/Satıcı</th>
                    <th scope="col">Teklif Tarihi</th>
                    <th scope="col">Teklif Veren Kullanıcı</th>
                    <th scope="col">Teklif Toplamı</th>
                    <th scope="col">Teklif Türü</th>
                    <th scope="col">Teklif Acıklama</th>
                    <th>Müşteri Düzenle</th>
                    <th scope="col">Teklif Durum</th>
                    <th scope="col">Teklif File</th>
                </tr>
                </thead>
                @php $say=1; @endphp
                <tbody>

                     @foreach($jquerys as $jquery)

                    <tr>
                        <th scope="row">@php echo $say++ @endphp</th>
                        <td>{{ $jquery->customer->name }}</td>

                        <td>{{!empty($jquery->seller->seller_name) ? $jquery->seller->seller_name : null}}</td>

                        <td>{{ $jquery->offer_date->format('d.m.Y')}}</td>
                        <td>{{ $jquery->user->name }}</td>
                        @if($jquery->product==1 && $jquery->accept_type=='Aylık')
                            <td>{{number_format($jquery->offer_money,2,',','.')}}</td>
                        @elseif($jquery->product==1)
                            <td>%{{$jquery->offer_money}}</td>
                        @elseif($jquery->product==6)
                            <td>{{$jquery->offer_total}}</td>
                        @else
                            <td>{{number_format($jquery->offer_total,0,',','.').' '}}TL</td>
                        @endif

                        <td>{{$jquery->tproduct->name}}</td>

                        <td > <textarea>@foreach($jquery->explanations as $explanation)
                                    {{$explanation->date->format('d.m.Y').' '.$explanation->explanation}} @endforeach </textarea>
                        </td>

                        <td>
                            <a href="{{route('customer_edit',['id'=>$jquery->customer_id])}}" ><button class="btn btn-info btn-xs">Müşteri Düzenle</button></a>
                        </td>

                        <td>@if($jquery->offer_status==1)
                                <a href="{{route('offer_status',['id'=>$jquery->id])}}" ><button class="btn btn-warning btn-xs">Bekleniyor</button></a>

                            @elseif($jquery->offer_status==2)
                                <a href="{{route('offer_status',['id'=>$jquery->id])}}" ><button class="btn btn-success btn-xs">Kabul Edildi</button></a>

                            @elseif($jquery->offer_status==0)
                                <button class="btn btn-danger btn-xs">Reddedildi</button>
                            @endif

                        </td>

                        <td><a href="{{route('offer_edit',['id'=>$jquery->id])}}"><button class="btn btn-primary btn-xs">Güncelle</button></a>
                            <a href="{{route('offer_delete',['id'=>$jquery->id])}}"><Button class="btn btn-danger">Sil</Button></a>
{{--                            <a href="{{route('offer_file',['id' => $jquery->id])}}"><img src="https://img.icons8.com/officel/40/000000/pdf.png"/></a>--}}
                            <a href="{{route('offer_file',['id' => $jquery->id])}}"><img class="fa fa-file-pdf-o"/></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>

<div class="form-group col-md-2 col-sm-3 col-xs-12 col">
     <label for="">Gönderilen Teklif</label>
    <input class="form-control" type="text" value="{{number_format($jquerys->whereNotIn('product',1)->sum('offer_total'),2,',','.')}}" disabled="">
    <label for="">Kabul Edilen Teklif </label>
    <input class="form-control" type="text" value="{{number_format($jquerys->whereNotIn('product',1)->where('offer_status',2)->whereNotIn('product',1)->sum('offer_total'),2,',','.')}}" disabled="">
</div>


    </section>


    <script>
        $(document).ready(function () {
            //Pagination numbers
            $('#paginationNumbers').DataTable({
                "pagingType": "numbers"
            });
        });
    </script>



@endsection
@section('css')@endsection
@section('js')@endsection



