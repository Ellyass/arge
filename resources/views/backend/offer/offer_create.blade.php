{{--@extends('backend.layout')--}}
{{--@section('content')--}}

{{--    <section class="content-header">--}}
{{--        <div class="box box-primary">--}}
{{--            <div class="box-header with-border"></div>--}}
{{--            <div class="box-body">--}}

{{--                <div id="bos" style="margin-left: 20px;">--}}
{{--                    <p><strong>Hangi Teklifi Yükliyceksiniz ?</strong></p>--}}
{{--                </div>--}}

{{--                <div class="form-group" align="right">--}}
{{--                        <div class="col-md-10  col-xs-12">--}}
{{--                            <label for="" style="" class="col-sm-10 col-xs-12 col-md-6">Eski Sistem</label>--}}
{{--                            <select class="form-control" name="eskiproduct" >--}}
{{--                                <option value="nul">Seçiniz</option>--}}
{{--                                <option value="t">Teşvik</option>--}}
{{--                                <option value="k">Kvkk</option>--}}
{{--                                <option value="e">Eğitim</option>--}}
{{--                                <option value="b">Bodroloma</option>--}}
{{--                                <option value="d">Danışmanlık</option>--}}
{{--                                <option value="y">Yazılım</option>--}}
{{--                                <option value="p">Performans</option>--}}
{{--                                <option value="ebor">E-Bordro</option>--}}
{{--                                <option value="dk">D-Kvkk</option>--}}
{{--                                <option value="dt">D-Teşvik</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            <div id="t">--}}
{{--        <form action="{{route('offer_import')}}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12" >--}}
{{--                <label for="exampleInputPassword1">Firma Seciniz</label>--}}
{{--                <select class="form-control" name="customer_id">--}}
{{--                    @foreach($customers as $customer)--}}
{{--                        <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <input type="hidden" name="product" value="1">--}}
{{--            <div class="form-group col-md-5 " id="seller_type">--}}
{{--                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>--}}
{{--                <select class="form-control" name="Seller" >--}}
{{--                    @foreach($sellers as $seller)--}}
{{--                        <option value="{{$seller->id}}">{{$seller->seller_name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <input type="hidden" name="offer_amount" value="1">--}}
{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">Yüzdelik Oranı</label>--}}
{{--                <input type="text" name="offer_money" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">KDV</label>--}}
{{--                <select name="kdv"  class="form-control">--}}
{{--                    <option value="1">KDV DAHİL</option>--}}
{{--                    <option value="0">KDV DAHİL DEĞİL</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>--}}
{{--                <input type="date" name="offer_date" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Açıklama Giriniz</label>--}}
{{--                <input type="text" name="offer_explanation" class="form-control">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Dosyası </label>--}}
{{--                <input type="file" name="offer_file" class="form-control">--}}
{{--            </div>--}}
{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">--}}
{{--                <button  class="btn btn-success ">Teklif Kaydet</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--            <!--tesvik-->--}}
{{--            <div id="y">--}}
{{--        <form action="{{route('offer_import')}}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}


{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12" >--}}
{{--                <label for="exampleInputPassword1">Firma Seciniz</label>--}}
{{--                <select class="form-control" name="customer_id">--}}
{{--                    @foreach($customers as $customer)--}}
{{--                        <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <input type="hidden" name="product" value="8">--}}
{{--            <div class="form-group col-md-5 " id="seller_type">--}}
{{--                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>--}}
{{--                <select class="form-control" name="Seller" >--}}
{{--                    @foreach($sellers as $seller)--}}
{{--                        <option value="{{$seller->id}}">{{$seller->seller_name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <input type="hidden" name="offer_amount" value="1">--}}
{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">Ücret</label>--}}
{{--                <input type="text" name="offer_money" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">KDV</label>--}}
{{--                <select name="kdv"  class="form-control">--}}
{{--                    <option value="1">KDV DAHİL</option>--}}
{{--                    <option value="0">KDV DAHİL DEĞİL</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>--}}
{{--                <input type="date" name="offer_date" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Açıklama Giriniz</label>--}}
{{--                <input type="text" name="offer_explanation" class="form-control">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Dosyası </label>--}}
{{--                <input type="file" name="offer_file" class="form-control">--}}
{{--            </div>--}}
{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">--}}
{{--                <button  class="btn btn-success ">Teklif Kaydet</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--            <!--yazılım-->--}}
{{--            <div id="b">--}}
{{--        <form action="{{route('offer_import')}}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12" >--}}
{{--                <label for="exampleInputPassword1">Firma Seciniz</label>--}}
{{--                <select class="form-control" name="customer_id">--}}
{{--                    @foreach($customers as $customer)--}}
{{--                        <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <input type="hidden" name="product" value="4">--}}
{{--            <br>--}}
{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col" id="seller_type">--}}
{{--                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>--}}
{{--                <select class="form-control" name="Seller" >--}}
{{--                    @foreach($sellers as $seller)--}}
{{--                        <option value="{{$seller->id}}">{{$seller->seller_name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Çalışan Sayısı</label>--}}
{{--                <input type="text" name="offer_amount" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">Birim Fiyatı</label>--}}
{{--                <input type="text" name="offer_money" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">KDV</label>--}}
{{--                <select name="kdv"  class="form-control">--}}
{{--                    <option value="1">KDV DAHİL</option>--}}
{{--                    <option value="0">KDV DAHİL DEĞİL</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>--}}
{{--                <input type="date" name="offer_date" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Açıklama Giriniz</label>--}}
{{--                <input type="text" name="offer_explanation" class="form-control">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Dosyası </label>--}}
{{--                <input type="file" name="offer_file" class="form-control">--}}
{{--            </div>--}}
{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">--}}
{{--                <button  class="btn btn-success ">Teklif Kaydet</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--            <!--bodrolama bitiş-->--}}
{{--            <div id="k">--}}
{{--        <form action="{{route('offer_import')}}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}

{{--            <br>--}}
{{--            <br>--}}
{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12" >--}}
{{--                <label for="exampleInputPassword1">Firma Seciniz</label>--}}
{{--                <select class="form-control" name="customer_id">--}}
{{--                    @foreach($customers as $customer)--}}
{{--                        <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <input type="hidden" name="product" value="2">--}}
{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col" id="seller_type">--}}
{{--                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>--}}
{{--                <select class="form-control" name="Seller" >--}}
{{--                    @foreach($sellers as $seller)--}}
{{--                        <option value="{{$seller->id}}">{{$seller->seller_name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}


{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <input type="hidden" name="offer_amount" class="form-control" value="1">--}}
{{--            </div>--}}


{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">Ücret</label>--}}
{{--                <input type="text" required name="offer_money" class="form-control" value="" >--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">KDV</label>--}}
{{--                <select name="kdv"  class="form-control">--}}
{{--                    <option value="1">KDV DAHİL</option>--}}
{{--                    <option value="0">KDV DAHİL DEĞİL</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>--}}
{{--                <input type="date"  name="offer_date" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Açıklama Giriniz</label>--}}
{{--                <input type="text" name="offer_explanation" class="form-control">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Dosyası </label>--}}
{{--                <input type="file" name="offer_file" class="form-control">--}}
{{--            </div>--}}
{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">--}}
{{--                <button  class="btn btn-success gonder">Teklif Kaydet</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--            <!--kvkk-->--}}
{{--            <div id="d">--}}

{{--        <form action="{{route('offer_import')}}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12" >--}}
{{--                <label for="exampleInputPassword1">Firma Seciniz</label>--}}
{{--                <select class="form-control" name="customer_id">--}}
{{--                    @foreach($customers as $customer)--}}
{{--                        <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <input type="hidden" name="product" value="5">--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col" id="seller_type">--}}
{{--                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>--}}
{{--                <select class="form-control" name="Seller" >--}}
{{--                    @foreach($sellers as $seller)--}}
{{--                        <option value="{{$seller->id}}">{{$seller->seller_name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}

{{--                <input type="hidden" name="offer_amount" class="form-control" value="1">--}}
{{--            </div>--}}
{{--            <!--birim fiyatı varsayılan 1 olarak tanımlanacak -->--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">Ücret</label>--}}
{{--                <input type="text" name="offer_money" class="form-control" value="" >--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">KDV</label>--}}
{{--                <select name="kdv"  class="form-control">--}}
{{--                    <option value="1">KDV DAHİL</option>--}}
{{--                    <option value="0">KDV DAHİL DEĞİL</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>--}}
{{--                <input type="date" name="offer_date" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Açıklama Giriniz</label>--}}
{{--                <input type="text" name="offer_explanation" class="form-control">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Dosyası </label>--}}
{{--                <input type="file" name="offer_file" class="form-control">--}}
{{--            </div>--}}
{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">--}}
{{--                <button  class="btn btn-success gonder">Teklif Kaydet</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--            <!--danışmanlık-->--}}
{{--            <div id="e">--}}
{{--        <form action="{{route('offer_import')}}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12" >--}}
{{--                <label for="exampleInputPassword1">Firma Seciniz</label>--}}
{{--                <select class="form-control" name="customer_id">--}}
{{--                    @foreach($customers as $customer)--}}
{{--                        <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                <input type="hidden" name="product" value="3">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col" id="seller_type">--}}
{{--                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>--}}
{{--                <select class="form-control" name="Seller" id="">--}}
{{--                    @foreach($sellers as$seller)--}}
{{--                        <option value="{{$seller->id}}">{{$seller->seller_name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Eğitim Gün Sayısı</label>--}}
{{--                <input type="text" name="offer_amount" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">Birim Fiyatı(Günlük Ücret)</label>--}}
{{--                <input type="text" name="offer_money" class="form-control" value="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                <label for="exampleInputPassword1">KDV</label>--}}
{{--                <select name="kdv"  class="form-control">--}}
{{--                    <option value="1">KDV DAHİL</option>--}}
{{--                    <option value="0">KDV DAHİL DEĞİL</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>--}}
{{--                <input type="date" name="offer_date" class="form-control" value="">--}}

{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Açıklama Giriniz</label>--}}
{{--                <input type="text" name="offer_explanation" class="form-control">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                <label for="exampleInputPassword1">Teklif Dosyası </label>--}}
{{--                <input type="file" name="offer_file" class="form-control">--}}
{{--            </div>--}}

{{--            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">--}}
{{--                <button  class="btn btn-success gonder">Teklif Kaydet</button>--}}
{{--            </div>--}}

{{--        </form>--}}
{{--    </div>--}}
{{--            <!--Eğitim Bitiş-->--}}
{{--            <div id="p">--}}
{{--        <div class="container container-fluid">--}}
{{--            <form action="{{route('offer_import')}}" method="POST">--}}
{{--                @csrf--}}

{{--                <div class="card-header"></div>--}}

{{--                <div class="container">--}}
{{--                    <div class="row m-t-5">--}}
{{--                        <div class="col-md-5 ">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="">Firma Seç</label>--}}
{{--                                <select class="selectpicker select2 form-control" name="customer_id" data-live-search="true" id="">--}}
{{--                                    @foreach($customers as $customer)--}}
{{--                                        <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-5">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="">Pazarlamacı Seç</label>--}}
{{--                                <select class="form-control" name="target_Seller_id" >--}}
{{--                                    @foreach($sellers as $seller)--}}
{{--                                        <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row m-t-5">--}}
{{--                        <div class="col-md-5 ">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="">Aylık Ücret</label>--}}
{{--                                <input type="text"  class="form-control" name="month_money" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-5">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="">Yıllık Ücret</label>--}}
{{--                                <input type="text" class="form-control" name="year_money" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row m-t-5">--}}
{{--                        <div class="col-md-5">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="">Çalışan Sayısı</label>--}}
{{--                                <input type="number" class="form-control" name="employee_count" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-5">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="">KDV</label>--}}
{{--                                <select name="kdv"  class="form-control">--}}
{{--                                    <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>--}}
{{--                                    <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row m-t-5">--}}
{{--                        <div class="col-md-5">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>--}}
{{--                                <input type="date" name="offer_date" class="form-control" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">Açıklama Giriniz</label>--}}
{{--                                <input type="text" name="offer_explanation" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">--}}
{{--                    <button  class="btn btn-success ">Pdf Oluştur</button>--}}
{{--                </div>--}}

{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--            <!--performans bitiş-->--}}
{{--            <div id="ebor">--}}
{{--                <div class="container container-fluid">--}}
{{--                    <form action="{{route('offer_import')}}" method="POST" >--}}
{{--                        @csrf--}}
{{--                        <br>--}}
{{--                        <div class="form-group col-md-5 col-sm-3 col-xs-12" >--}}
{{--                            <label for="exampleInputPassword1">Firma Seciniz</label>--}}
{{--                            <select class="form-control" name="customer_id">--}}
{{--                                @foreach($customers as $customer )--}}
{{--                                    <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <input type="hidden" name="product" value="4">--}}
{{--                        <input type="hidden" name="teklif_new" value="Evet">--}}


{{--                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>--}}
{{--                            <select class="form-control" name="target_Seller_id" >--}}
{{--                                @foreach($sellers as $seller)--}}
{{--                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                            <label for="exampleInputPassword1">Ücret</label>--}}
{{--                            <input type="text" name="offer_money" class="form-control" value="" >--}}
{{--                        </div>--}}

{{--                        <div  class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                            <label for="exampleInputPassword1">KDV</label>--}}
{{--                            <select name="kdv"  class="form-control">--}}
{{--                                <option value="KDV DAHİL">KDV DAHİL</option>--}}
{{--                                <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="form-group form-group col-md-5 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>--}}
{{--                            <input type="date" required name="offer_date" class="form-control">--}}
{{--                        </div>--}}


{{--                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Açıklama Giriniz</label>--}}
{{--                            <input type="text" name="offer_explanation" class="form-control">--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Teklif Dosyası </label>--}}
{{--                            <input type="file" name="offer_file" class="form-control">--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">--}}
{{--                            <button  class="btn btn-success ">Pdf Oluştur</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--E-bordro bitiş -->--}}
{{--            <div id="dk">--}}
{{--                <div class="container container-fluid">--}}
{{--                    <form action="{{route('offer_import')}}" method="POST" >--}}
{{--                        @csrf--}}

{{--                        <div class="form-group col-md-5 col-sm-3 col-xs-12" >--}}
{{--                            <label for="exampleInputPassword1">Firma Seciniz</label>--}}
{{--                            <select class="form-control" name="customer_id">--}}
{{--                                @foreach($customers as $customer )--}}
{{--                                    <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <input type="hidden" name="product" value="4">--}}
{{--                        <input type="hidden" name="teklif_new" value="Evet">--}}


{{--                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>--}}
{{--                            <select class="form-control" name="target_Seller_id" >--}}
{{--                                @foreach($sellers as $seller)--}}
{{--                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                            <label for="exampleInputPassword1">Ücret</label>--}}
{{--                            <input type="text" name="offer_money" class="form-control" value="" >--}}
{{--                        </div>--}}

{{--                        <div  class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                            <label for="exampleInputPassword1">KDV</label>--}}
{{--                            <select name="kdv"  class="form-control">--}}
{{--                                <option value="KDV DAHİL">KDV DAHİL</option>--}}
{{--                                <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="form-group form-group col-md-5 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>--}}
{{--                            <input type="date" required name="offer_date" class="form-control">--}}
{{--                        </div>--}}


{{--                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Açıklama Giriniz</label>--}}
{{--                            <input type="text" name="offer_explanation" class="form-control">--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Teklif Dosyası </label>--}}
{{--                            <input type="file" name="offer_file" class="form-control">--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">--}}
{{--                            <button  class="btn btn-success ">Pdf Oluştur</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--D-kvkk bitiş-->--}}
{{--            <div id="dt">--}}
{{--                <div class="container container-fluid">--}}
{{--                    <form action="{{route('offer_import')}}" method="POST" >--}}
{{--                        @csrf--}}

{{--                        <div class="form-group col-md-5 col-sm-3 col-xs-12" >--}}
{{--                            <label for="exampleInputPassword1">Firma Seciniz</label>--}}
{{--                            <select class="form-control" name="customer_id">--}}
{{--                                @foreach($customers as $customer )--}}
{{--                                    <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <input type="hidden" name="product" value="4">--}}
{{--                        <input type="hidden" name="teklif_new" value="Evet">--}}


{{--                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>--}}
{{--                            <select class="form-control" name="target_Seller_id" >--}}
{{--                                @foreach($sellers as $seller)--}}
{{--                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                            <label for="exampleInputPassword1">Ücret</label>--}}
{{--                            <input type="text" name="offer_money" class="form-control" value="" >--}}
{{--                        </div>--}}

{{--                        <div  class="form-group col-md-5 col-sm-3 col-xs-12 col"  >--}}
{{--                            <label for="exampleInputPassword1">KDV</label>--}}
{{--                            <select name="kdv"  class="form-control">--}}
{{--                                <option value="KDV DAHİL">KDV DAHİL</option>--}}
{{--                                <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="form-group form-group col-md-5 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>--}}
{{--                            <input type="date" required name="offer_date" class="form-control">--}}
{{--                        </div>--}}


{{--                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Açıklama Giriniz</label>--}}
{{--                            <input type="text" name="offer_explanation" class="form-control">--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >--}}
{{--                            <label for="exampleInputPassword1">Teklif Dosyası </label>--}}
{{--                            <input type="file" name="offer_file" class="form-control">--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">--}}
{{--                            <button  class="btn btn-success ">Pdf Oluştur</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--D-kvkk bitiş-->--}}

{{--        </div>--}}
{{--    </section>--}}
{{--    <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $("select").change(function(){--}}
{{--                $( "select option:selected").each(function(){--}}


{{--                    if($(this).attr("value")=="t"){--}}
{{--                        $("#b").hide();--}}
{{--                        $("#e").hide();--}}
{{--                        $("#k").hide();--}}
{{--                        $("#t").show();--}}
{{--                        $("#d").hide();--}}
{{--                        $("#p").hide();--}}
{{--                        $("#ebor").hide();--}}
{{--                        $("#dk").hide();--}}
{{--                        $("#dt").hide();--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#y").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="k"){--}}
{{--                        $("#b").hide();--}}
{{--                        $("#e").hide();--}}
{{--                        $("#k").show();--}}
{{--                        $("#t").hide();--}}
{{--                        $("#d").hide();--}}
{{--                        $("#p").hide();--}}
{{--                        $("#ebor").hide();--}}
{{--                        $("#dk").hide();--}}
{{--                        $("#dt").hide();--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#y").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="e"){--}}
{{--                        $("#b").hide();--}}
{{--                        $("#e").show();--}}
{{--                        $("#k").hide();--}}
{{--                        $("#t").hide();--}}
{{--                        $("#d").hide();--}}
{{--                        $("#p").hide();--}}
{{--                        $("#ebor").hide();--}}
{{--                        $("#dk").hide();--}}
{{--                        $("#dt").hide();--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#y").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="b") {--}}
{{--                        $("#b").show();--}}
{{--                        $("#e").hide();--}}
{{--                        $("#k").hide();--}}
{{--                        $("#t").hide();--}}
{{--                        $("#d").hide();--}}
{{--                        $("#p").hide();--}}
{{--                        $("#ebor").hide();--}}
{{--                        $("#dk").hide();--}}
{{--                        $("#dt").hide();--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#y").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="d"){--}}
{{--                        $("#b").hide();--}}
{{--                        $("#e").hide();--}}
{{--                        $("#k").hide();--}}
{{--                        $("#t").hide();--}}
{{--                        $("#d").show();--}}
{{--                        $("#p").hide();--}}
{{--                        $("#ebor").hide();--}}
{{--                        $("#dk").hide();--}}
{{--                        $("#dt").hide();--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#y").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="p"){--}}
{{--                        $("#b").hide();--}}
{{--                        $("#e").hide();--}}
{{--                        $("#k").hide();--}}
{{--                        $("#t").hide();--}}
{{--                        $("#d").hide();--}}
{{--                        $("#p").show();--}}
{{--                        $("#y").hide();--}}
{{--                        $("#ebor").hide();--}}
{{--                        $("#dk").hide();--}}
{{--                        $("#dt").hide();--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="y") {--}}
{{--                        $("#b").hide();--}}
{{--                        $("#e").hide();--}}
{{--                        $("#k").hide();--}}
{{--                        $("#t").hide();--}}
{{--                        $("#d").hide();--}}
{{--                        $("#p").hide();--}}
{{--                        $("#y").show();--}}
{{--                        $("#ebor").hide();--}}
{{--                        $("#dk").hide();--}}
{{--                        $("#dt").hide();--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                    }--}}

{{--                        if($(this).attr("value")=="ebor"){--}}
{{--                            $("#b").hide();--}}
{{--                            $("#e").hide();--}}
{{--                            $("#k").hide();--}}
{{--                            $("#t").hide();--}}
{{--                            $("#d").hide();--}}
{{--                            $("#p").hide();--}}
{{--                            $("#y").hide();--}}
{{--                            $("#ebor").show();--}}
{{--                            $("#dk").hide();--}}
{{--                            $("#dt").hide();--}}
{{--                            $("#bodrolama").hide();--}}
{{--                            $("#Egitim").hide();--}}
{{--                            $("#kvkk").hide();--}}
{{--                            $("#tesvik").hide();--}}
{{--                            $("#danismanlik").hide();--}}
{{--                            $("#ikmetrik").hide();--}}
{{--                            $("#iys").hide();--}}
{{--                            $("#bos").hide();--}}
{{--                        }--}}

{{--                    if($(this).attr("value")=="dk"){--}}
{{--                        $("#b").hide();--}}
{{--                        $("#e").hide();--}}
{{--                        $("#k").hide();--}}
{{--                        $("#t").hide();--}}
{{--                        $("#d").hide();--}}
{{--                        $("#p").hide();--}}
{{--                        $("#y").hide();--}}
{{--                        $("#ebor").hide();--}}
{{--                        $("#dk").show();--}}
{{--                        $("#dt").hide();--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="dt"){--}}
{{--                        $("#b").hide();--}}
{{--                        $("#e").hide();--}}
{{--                        $("#k").hide();--}}
{{--                        $("#t").hide();--}}
{{--                        $("#d").hide();--}}
{{--                        $("#p").hide();--}}
{{--                        $("#y").hide();--}}
{{--                        $("#ebor").hide();--}}
{{--                        $("#dk").hide();--}}
{{--                        $("#dt").show();--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="nul") {--}}
{{--                        $("#b").hide();--}}
{{--                        $("#e").hide();--}}
{{--                        $("#k").hide();--}}
{{--                        $("#t").hide();--}}
{{--                        $("#d").hide();--}}
{{--                        $("#p").hide();--}}
{{--                        $("#bos").show();--}}
{{--                        $("#y").hide();--}}
{{--                        $("#ebor").hide();--}}
{{--                        $("#dk").hide();--}}
{{--                        $("#dt").hide();--}}
{{--                    }--}}
{{--                });--}}
{{--            }).change();--}}
{{--        });--}}
{{--    </script>--}}

{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $("select").change(function(){--}}
{{--                $( "select option:selected").each(function(){--}}

{{--                    if($(this).attr("value")=="tesvik"){--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").show();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="kvkk"){--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").show();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="egitim"){--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").show();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="bodrolama") {--}}
{{--                        $("#bodrolama").show();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="danismanlik") {--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#danismanlik").show();--}}
{{--                        $("#bos").hide();--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="ikmetrik") {--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#ikmetrik").show();--}}
{{--                        $("#bos").hide();--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="bos") {--}}
{{--                        $("#bodrolama").hide(1000);--}}
{{--                        $("#Egitim").hide(1000);--}}
{{--                        $("#kvkk").hide(1000);--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#tesvik").hide(1000);--}}
{{--                        $("#danismanlik").hide(1000);--}}
{{--                        $("#bos").show(1000);--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="İYS Danışmanlık") {--}}
{{--                        $("#bodrolama").hide(1000);--}}
{{--                        $("#Egitim").hide(1000);--}}
{{--                        $("#kvkk").hide(1000);--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").show();--}}
{{--                        $("#tesvik").hide(1000);--}}
{{--                        $("#danismanlik").hide(1000);--}}
{{--                        $("#bos").hide(1000);--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="Performans") {--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                        $("#performans").show();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="e-bordro") {--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").show();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="dkvkk") {--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").show();--}}
{{--                        $("#dtesvik").hide();--}}
{{--                    }--}}

{{--                    if($(this).attr("value")=="dtesvik") {--}}
{{--                        $("#bodrolama").hide();--}}
{{--                        $("#Egitim").hide();--}}
{{--                        $("#kvkk").hide();--}}
{{--                        $("#ikmetrik").hide();--}}
{{--                        $("#iys").hide();--}}
{{--                        $("#tesvik").hide();--}}
{{--                        $("#danismanlik").hide();--}}
{{--                        $("#bos").hide();--}}
{{--                        $("#performans").hide();--}}
{{--                        $("#e-bordro").hide();--}}
{{--                        $("#dkvkk").hide();--}}
{{--                        $("#dtesvik").show();--}}
{{--                    }--}}
{{--                });--}}
{{--            }).change();--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $("select").change(function(){--}}
{{--                $( "select option:selected").each(function(){--}}

{{--                    if($(this).attr("value")=="Aylık"){--}}
{{--                        $("#month").show();--}}
{{--                        $("#year").hide();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="Yıllık"){--}}

{{--                        $("#month").hide();--}}
{{--                        $("#year").show();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="null"){--}}
{{--                        $("#month").hide();--}}
{{--                        $("#year").hide();--}}
{{--                    }--}}
{{--                });--}}
{{--            }).change();--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $("select").change(function(){--}}
{{--                $( "select option:selected").each(function(){--}}

{{--                    if($(this).attr("value")=="bordro_ucret"){--}}
{{--                        $("#basi_ucret").show();--}}
{{--                        $("#net_ucrett").hide();--}}
{{--                        $("#bordro_type").show();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="net_ucret"){--}}
{{--                        $("#basi_ucret").hide();--}}
{{--                        $("#net_ucrett").show();--}}
{{--                        $("#bordro_type").show();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="seç"){--}}
{{--                        $("#basi_ucret").hide();--}}
{{--                        $("#net_ucrett").hide();--}}
{{--                        $("#bordro_type").hide();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="net_ucret_tesvik"){--}}
{{--                        $("#tesvik_yuzdelik").hide();--}}
{{--                        $("#net_tesvik").show();--}}
{{--                        $("#type").show();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="yuzdelik_ucret_tesvik"){--}}
{{--                        $("#tesvik_yuzdelik").show();--}}
{{--                        $("#net_tesvik").hide();--}}
{{--                        $("#type").show();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="Ücretsiz"){--}}
{{--                        $("#tesvik_yuzdelik").hide();--}}
{{--                        $("#net_tesvik").hide();--}}
{{--                        $("#type").hide();--}}
{{--                    }--}}
{{--                });--}}
{{--            }).change();--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $("select").change(function(){--}}
{{--                $( "select option:selected").each(function(){--}}
{{--                    if($(this).attr("value")=="ileri"){--}}
{{--                        $("#L_sabit").show();--}}
{{--                        $("#L_yuzdelik").hide();--}}
{{--                        $("#tesvik_s_y").show();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="geri"){--}}
{{--                        $("#L_sabit").hide();--}}
{{--                        $("#L_yuzdelik").show();--}}
{{--                        $("#tesvik_s_y").show();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="Sucret"){--}}

{{--                        $("#L_sabit").hide();--}}
{{--                        $("#L_yuzdelik").hide();--}}
{{--                        $("#tesvik_s_y").hide();--}}
{{--                    }--}}
{{--                });--}}
{{--            }).change();--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $("select").change(function(){--}}
{{--                $( "select option:selected").each(function(){--}}

{{--                    if($(this).attr("value")=="var"){--}}

{{--                        $("#ucret_var").hide();--}}
{{--                        $("#penetrasyon_test_ucret").show();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="yok"){--}}

{{--                        $("#ucret_var").hide();--}}
{{--                        $("#penetrasyon_test_ucret").hide();--}}
{{--                    }--}}
{{--                    if($(this).attr("value")=="ucretVar"){--}}

{{--                        $("#ucret_var").show();--}}
{{--                    }--}}
{{--                });--}}
{{--            }).change();--}}
{{--        });--}}
{{--    </script>--}}
{{--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>--}}
{{--    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
{{--    <script>--}}
{{--        $(function() {--}}
{{--            // Remove button click--}}
{{--            $(document).on(--}}
{{--                'click',--}}
{{--                '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',--}}
{{--                function(e) {--}}
{{--                    e.preventDefault();--}}
{{--                    $(this).closest('.form-inline').remove();--}}
{{--                }--}}
{{--            );--}}
{{--            // Add button click--}}
{{--            $(document).on(--}}
{{--                'click',--}}
{{--                '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',--}}
{{--                function(e) {--}}
{{--                    e.preventDefault();--}}
{{--                    var container = $(this).closest('[data-role="dynamic-fields"]');--}}
{{--                    new_field_group = container.children().filter('.form-inline:first-child').clone();--}}
{{--                    new_field_group.find('input').each(function(){--}}
{{--                        $(this).val('');--}}
{{--                    });--}}
{{--                    container.append(new_field_group);--}}
{{--                }--}}
{{--            );--}}
{{--        });--}}

{{--    </script>--}}

{{--@endsection--}}
{{--@section('css')@endsection--}}
{{--@section('js')@endsection--}}

