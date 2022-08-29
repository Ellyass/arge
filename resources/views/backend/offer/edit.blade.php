@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border"></div>
            <div class="box-body">


                <div id="tesvik">
                    <form action="{{route('offer_update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="new_tesvik">
                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">İş başı Eğitim</label>
                                <select class="form-control" name="egitim">
                                    <option selected value="var">Eğitim Maddesi Var</option>
                                    <option selected value="yok">Eğitim Maddesi Yok</option>
                                </select>
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Sabit Ücret/Yüzdelik</label>
                                <select class="form-control" name="accept_type">
                                    <option selected value="null">Seçiniz</option>
                                    <option value="Aylık">Aylık Ücret</option>
                                    <option value="Yüzdelik">Yüzdelik Değer</option>
                                </select>
                            </div>


                            <input type="hidden" name="product" value="1">

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">KDV</label>
                                <select name="kdv" class="form-control">
                                    <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                                    <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
                                </select>
                            </div>

                            <input type="hidden" name="offer_amount" class="form-control" value="1">

                            <div id="tesviksy" class="form-group col-md-5 col-sm-3 col-xs-12 col">

                                <div id="fixed" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                    <label for="exampleInputPassword1">Sabit Ücret : </label>
                                </div>

                                <div id="percentile" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                    <label for="exampleInputPassword1">Yüzdelik Oranı : </label>
                                </div>

                                <div class="form-group col-md-6 col-sm-3 col-xs-12 col">
                                    <input type="number" name="offer_money" minlength="1" maxlength="100"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                                <input type="date" name="offer_date" class="form-control" required>
                            </div>

                            <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Açıklama Giriniz</label>
                                <input type="text" name="explanation" class="form-control">
                            </div>

                            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                                <button type="submit" class="btn btn-success ">Teklifi Kaydet</button>
                            </div>

                        </div>
                    </form>

                    <div class="form-group col-md-10 col-sm3 col-xs-12 col" align="right">
                        <a href="{{ route('document_wordtopdf')}}">
                            <button class="btn btn-danger">Pdf Çevir</button>
                        </a>
                    </div>
                </div>
                <!-- teşvik bitiş-->

                <div id="kvkk">
                    <form action="{{route('offer_update')}}" method="POST">
                        @csrf

                        <input type="hidden" name="product" value="2">
                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div id="new_kvkk">
                            <input type="hidden" name="offer_amount" class="form-control" value="1">

                            <!--birim fiyatı varsayılan 1 olarak tanımlanacak -->

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Ücret</label>
                                <input type="number" name="offer_money" class="form-control">
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Yüzdelik</label>
                                <input type="number" name="yuzdelik" class="form-control">
                            </div>
                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Konaklama Durum</label>
                                <select class="form-control" name="home">
                                    <option value="(Konaklama tarafımıza aittir)">Konaklama TARAFIMIZA aittir</option>
                                    <option value="(Konaklama tarafınıza aittir)">Konaklama TARAFINIZA aittir</option>
                                </select>
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Penetrasyon</label>
                                <select class="form-control" name="penetrasyon">
                                    <option value="var">Penetrasyon Testi Var</option>
                                    <option selected value="yok">Penetrasyon Testi Yok</option>

                                </select>
                            </div>

                            <div id="penetrasyon_test_ucret">
                                <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                    <label for="exampleInputPassword1">Penetrasyon Testi Ücreti</label>
                                    <select class="form-control" name="penetrasyon_ucret_sql">
                                        <option selected value="0">Seçiniz</option>
                                        <option value="ucretVar">Penetrasyon Test Ücreti Var</option>
                                        <option value="ucretYok">Penetrasyon Test Ücreti Yok</option>
                                    </select>
                                </div>
                            </div>

                            <div id="ucret_var" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Penetrasyon Testi Ücreti Giriniz</label>
                                <input class="form-control" type="text" name="penetrasyon_ucreti">
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">KDV</label>
                                <select name="kdv" class="form-control">
                                    <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                                    <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                                <input type="date" name="offer_date" class="form-control">
                            </div>
                        </div>


                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="offer_explanation" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-success gonder">Teklifi Kaydet</button>
                        </div>
                    </form>
                    <div class="form-group col-md-10 col-sm3 col-xs-12 col" align="right">
                        <a href="{{ route('document_wordtopdf')}}">
                            <button class="btn btn-danger">Pdf Çevir</button>
                        </a>
                    </div>
                </div>
                <!-- kvkk bitiş-->

                <div id="egitim">

                    <form action="{{route('offer_update')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
                        <input type="hidden" name="product" value="3">


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Eğitim Gün Sayısı</label>
                            <input type="number" name="offer_amount" class="form-control">
                        </div>


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Birim Fiyatı(Günlük Ücret)</label>
                            <input type="number" name="offer_money" class="form-control">
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">KDV</label>
                            <select name="kdv" class="form-control">
                                <option value="Aylık">KDV DAHİL</option>
                                <option value="Yıllık">KDV DAHİL DEĞİL</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                            <input type="date" name="offer_date" class="form-control" required>
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>


                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-success">Teklif Kaydet</button>
                        </div>

                    </form>
                </div>
                <!--egitim bitis-->

                <div id="Bordrolama">
                    <form action="{{route('offer_update')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
                        <input type="hidden" name="product" value="4">

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="new_bordrolama">

                            <div class="col-md-5 col-sm-3 col-xs-12">
                                <label for="exampleInputPassword1">Bordro Ücreti</label>
                                <select class="form-control col-md-5 col-sm-3 col-xs-12 " name="bordro_type">
                                    <option selected value="seç">Seçiniz</option>
                                    <option value="bordro_ucret">Bodro Başı</option>
                                    <option value="net_ucret">Net Ücret</option>
                                </select>
                            </div>

                            <div class="col-md-5 col-sm-3 col-xs-12">
                                <label for="exampleInputPassword1">Teşvik Ücreti</label>
                                <select class="form-control col-md-5 col-sm-3 col-xs-12 " name="tesvik_type">
                                    <option selected value="null">Teşvik Hizmeti Yok</option>
                                    <option value="Ücretsiz">Ucretsiz</option>
                                    <option value="net_tesvik">Net Ücret</option>
                                    <option value="yuzdelik_tesvik">Yüzdelik</option>
                                </select>
                            </div>

                            <div id="bordro_type" style=" margin-top: 10px;"
                                 class="form-group  col-md-5 col-sm-3 col-xs-12 col">
                                <div id="net_ucrett">
                                    <label for="exampleInputPassword1">Net Ücret(Aylık)</label>
                                </div>

                                <div id="basi_ucret">
                                    <label for="exampleInputPassword1">Bordro Başı</label>
                                </div>
                                <div>
                                    <input type="number" name="offer_money" class="form-control">
                                </div>
                            </div>

                            <div id="type" style=" margin-top: 8px;"
                                 class="form-group  col-md-5 col-sm-12 col-xs-12 col">
                                <div id="net_tesvik">
                                    <label for="exampleInputPassword1"> Teşvik Net Ücret(Aylık)</label>
                                </div>
                                <div id="yuzdelik_tesvik">
                                    <label for="exampleInputPassword1">Tesvik Yüzdelik</label>
                                </div>
                                <div id="type">
                                    <input type="number" name="tesvik_money" class="form-control">
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="offer_amount" value="1">
                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">KDV</label>
                                <select name="kdv" class="form-control">
                                    <option value="KDV DAHİL">KDV DAHİL</option>
                                    <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>
                                </select>
                            </div>

                            <div style="margin-top: 15px;"
                                 class="form-group form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                                <input type="date" required name="offer_date" class="form-control">
                            </div>

                            <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Açıklama Giriniz</label>
                                <input type="text" name="explanation" class="form-control">
                            </div>

                            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                                <button class="btn btn-success">Teklifi Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--bodrolama bitiş-->

                <div id="danismanlik">
                    <form action="{{route('danismanlik_post')}}" method="POST">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
                        <input type="hidden" name="product" value="5">

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="offer_amount" class="form-control" value="1">

                        <!--birim fiyatı varsayılan 1 olarak tanımlanacak -->
                        <div class="col-md-5 col-sm-3 col-xs-12">
                            <label for="exampleInputPassword1">Aylık/Net</label>
                            <select class="form-control col-md-5 col-sm-3 col-xs-12 " name="danismanlik_type">
                                <option selected value="seç">Seçiniz</option>
                                <option value="Aylık">Aylık</option>
                                <option value="">Net Ücret</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Ücret</label>
                            <input type="number" name="offer_money" class="form-control">
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Yüzdelik</label>
                            <input type="number" name="yuzdelik" class="form-control">
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Konaklama Durum</label>
                            <select class="form-control" name="home">
                                <option value="(Konaklama tarafımıza aittir)">Konaklama tarafımıza aittir</option>
                                <option value="(Konaklama tarafınıza aittir)">Konaklama tarafınıza aittir</option>
                                <option value="">bos</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">KDV</label>
                            <select name="kdv" class="form-control">
                                <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                                <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                            <input type="date" required name="offer_date" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>


                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-success">Teklif Kaydet</button>
                        </div>

                    </form>
                </div>
                <!--danismanlik bitis-->

                <div id="ikmetrik">
                    <form action="{{route('offer_update')}}" method="POST">

                        @csrf

                        <input type="hidden" name="product" value="6">
                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12">
                            <label for="exampleInputPassword1">Anlaşma Türü</label>
                            <select class="form-control" name="accept_type">
                                <option value="null">Seçiniz</option>
                                <option value="Aylık">Aylık</option>
                                <option value="Yıllık">Yıllık</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">İlgili Alıcı</label>
                            <input type="text" name="alici" class="form-control">
                        </div>

                        <div id="Month" class="form-group col-md-6 col-sm-3 col-xs-12">
                            <label for="exampleInputPassword1">Aylık</label>
                            <select class="form-control" name="Month">
                                <option selected value="">Seçiniz</option>
                                <option value="50">0-20</option>
                                <option value="5">21-300</option>
                                <option value="4">301-1000</option>
                                <option value="2">1001-5000</option>
                                <option value="1">5000+</option>
                            </select>

                            <div style="margin-top: 10px; margin-right: 15px;" class="col-md-5 col-sm-3 col-xs-12">
                                <label for="">Belirlenen Ücreti Giriniz</label>
                                <input class="form-control" type="number" name="month_free">
                            </div>
                        </div>

                        <div id="Year" class="form-group col-md-5 col-sm-3 col-xs-12">
                            <label for="exampleInputPassword1">Yıllık</label>
                            <select class="form-control" name="Year">
                                <option selected value="">Seçiniz</option>
                                <option value="40">0-20</option>
                                <option value="4">21-300</option>
                                <option value="3.2">301-1000</option>
                                <option value="100000">1001-5000</option>
                                <option value="1">5000+</option>
                            </select>

                            <div style="margin-top: 10px;" class="col-md-5 col-sm-3 form-group">
                                <label for="">Belirlenen Ücreti Giriniz</label>
                                <input class="form-control" type="number" name="year_free">
                            </div>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                            <input type="date" name="offer_date" class="form-control" required>
                        </div>

                        <input type="hidden" name="kdv" value="0">

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>


                        <textarea class="form-control" id="summary_ckeditor" name="summary_ckeditor"></textarea>
                        <script>
                            CKEDITOR.replace('editor1');
                        </script>


                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-success">Teklif Kaydet</button>
                        </div>
                    </form>
                    <div class="form-group col-md-10 col-sm3 col-xs-12 col" align="right">
                        <a href="{{ route('document_wordtopdf')}}">
                            <button class="btn btn-danger">Pdf Çevir</button>
                        </a>
                    </div>
                </div>
                <!--ikmetrik Bitiş-->

                <div id="iys">
                    <form action="{{route('offer_update')}}" method="POST">
                        @csrf

                        <input type="hidden" name="product" value="7">
                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="offer_amount" class="form-control" value="1">

                        <!--birim fiyatı varsayılan 1 olarak tanımlanacak -->

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Ücret</label>
                            <input type="number" name="offer_money" class="form-control">
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Yüzdelik</label>
                            <input type="text" name="yuzdelik" class="form-control">
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">KDV</label>
                            <select name="kdv" class="form-control">
                                <option value="1">KDV DAHİL</option>
                                <option value="0">KDV DAHİL DEĞİL</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                            <input type="date" required name="offer_date" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-success">Teklif Kaydet</button>
                        </div>
                    </form>
                </div>
                <!--iys Bitiş-->

                <div id="performans">
                    <form action="{{route('offer_update')}}" method="POST">
                        @csrf

                        <input type="hidden" name="product" value="9">
                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="">Pazarlamacı Seç</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Sabit/Yıllık Ücret</label>
                            <select class="form-control" name="accept_type">
                                <option selected value="null">Seçiniz</option>
                                <option value="Aylık">Aylık Ücret</option>
                                <option value="Yıllık">Yıllık Ücret</option>
                            </select>
                        </div>


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <div class="form-group">
                                <label for="">Çalışan Sayısı</label>
                                <input type="number" class="form-control" name="employee_count" required>
                            </div>
                        </div>


                        <input type="hidden" name="offer_amount" class="form-control" value="1">

                        <div id="performans_s_p" class="form-group col-md-5 col-sm-3 col-xs-12 col">

                            <div id="P_aylik" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Aylık Ücret : </label>
                            </div>

                            <div id="P_yillik" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Yıllık Oranı : </label>
                            </div>

                            <div class="form-group col-md-6 col-sm-3 col-xs-12 col">
                                <input type="number" name="offer_money" minlength="1" maxlength="100"
                                       class="form-control">
                            </div>
                        </div>


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="">KDV</label>
                            <select name="kdv" class="form-control">
                                <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                                <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                            <input type="date" name="offer_date" class="form-control" required>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-primary">word Oluştur</button>
                        </div>
                    </form>
                </div>
                <!--performans bitiş-->

                <div id="ebordro">
                    <form action="{{route('offer_update')}}" method="POST">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
                        <input type="hidden" name="product" value="10">


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="offer_amount" class="form-control" value="1">

                        <!--birim fiyatı varsayılan 1 olarak tanımlanacak -->

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Ödeme Şekli</label>
                            <select name="offer_tur" class="form-control">
                                <option value="Kişi Başı">Kişi Başı</option>
                                <option value="Aylık">Aylık</option>
                                <option value="Yıllık">Yıllık</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Ücret</label>
                            <input type="number" name="offer_money" class="form-control">
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">KDV</label>
                            <select name="kdv" class="form-control">
                                <option value="KDV DAHİLDİR">KDV DAHİL</option>
                                <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİL</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                            <input type="date" required name="offer_date" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-success">Teklif Kaydet</button>
                        </div>
                    </form>

                    <div class="form-group col-md-10 col-sm3 col-xs-12 col" align="right">
                        <a href="{{ route('document_wordtopdf')}}">
                            <button class="btn btn-danger">Pdf Çevir</button>
                        </a>
                    </div>
                </div>
                <!--ebordro Bitiş-->

                <div id="dijitalkvkk">

                    <div class="container container-fluid">
                        <form action="{{route('offer_update')}}" method="POST">
                            @csrf


                            <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                            <input type="hidden" name="offer_id" value="{{$offer->id}}">
                            <input type="hidden" name="product" value="11">
                            <input type="hidden" name="teklif_new" value="Evet">


                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                                <select class="form-control" name="target_Seller_id">
                                    @foreach($sellers as $seller)
                                        <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Yazılım Kurulum Ücreti</label>
                                <input type="number" name="offer_yazılım" class="form-control">
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Güncelleme Aralığı</label>
                                <select name="accept_type" class="form-control">
                                    <option value="Sucret">Seçiniz</option>
                                    <option value="Aylık">Aylık</option>
                                    <option value="Yıllık">Yıllık</option>
                                </select>
                            </div>

                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">KDV</label>
                                <select name="kdv" class="form-control">
                                    <option value="KDV DAHİL">KDV DAHİL</option>
                                    <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>
                                </select>
                            </div>

                            <div id="dkvkk_s_y" class="form-group col-md-5 col-sm-3 col-xs-12 col">

                                <div id="L_aylik" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                    <label for="exampleInputPassword1">Aylık Ücret : </label>
                                </div>

                                <div id="L_yillik" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                    <label for="exampleInputPassword1">Yıllık Ücret : </label>
                                </div>

                                <div class="form-group col-md-6 col-sm-3 col-xs-12 col">
                                    <input type="number" name="offer_money" minlength="1" maxlength="100"
                                           class="form-control">
                                </div>
                            </div>


                            <div class="form-group form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                                <input type="date" required name="offer_date" class="form-control">
                            </div>


                            <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Açıklama Giriniz</label>
                                <input type="text" name="explanation" class="form-control">
                            </div>

                            <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                                <button class="btn btn-success">Teklif Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--dkvkk bitiş-->

                <div id="dtesvik">

                    <form action="{{route('offer_update')}}" method="POST">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
                        <input type="hidden" name="product" value="12">
                        <input type="hidden" name="teklif_new" value="Evet">


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Ücret</label>
                            <input type="number" name="offer_money" class="form-control" value="">
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">KDV</label>
                            <select name="kdv" class="form-control">
                                <option value="KDV DAHİL">KDV DAHİL</option>
                                <option value="KDV DAHİL DEĞİL">KDV DAHİL DEĞİL</option>
                            </select>
                        </div>

                        <div class="form-group form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                            <input type="date" required name="offer_date" class="form-control">
                        </div>


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-success">Teklif kaydet</button>
                        </div>
                    </form>
                </div>
                <!--dtesvik bitiş-->

                <div id="mesemtesvik">
                    <form action="{{route('offer_update')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id">
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">İş başı Eğitim</label>
                            <select class="form-control" name="egitim">
                                <option selected value="var">Eğitim Maddesi Var</option>
                                <option selected value="yok">Eğitim Maddesi Yok</option>
                            </select>
                        </div>


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Sabit Ücret/Yüzdelik</label>
                            <select class="form-control" name="accept_type">
                                <option selected value="null">Seçiniz</option>
                                <option value="Aylık">Aylık Ücret</option>
                                <option value="Yüzdelik">Yüzdelik Değer</option>
                            </select>
                        </div>

                        <input type="hidden" name="product" value="13">
                        <input type="hidden" name="new_tesvik_offer" value="new_tesvik">


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">KDV</label>
                            <select name="kdv" class="form-control">
                                <option value="KDV DAHİLDİR">KDV DAHİLDİR</option>
                                <option value="KDV DAHİL DEĞİLDİR">KDV DAHİL DEĞİLDİR</option>
                            </select>
                        </div>


                        <input type="hidden" name="offer_amount" class="form-control" value="1">

                        <div id="tesvik_s_m" class="form-group col-md-5 col-sm-3 col-xs-12 col">

                            <div id="sabit" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Sabit Ücret : </label>
                            </div>

                            <div id="yuzdelik" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                <label for="exampleInputPassword1">Yüzdelik Oranı : </label>
                            </div>

                            <div class="form-group col-md-6 col-sm-3 col-xs-12 col">
                                <input type="number" name="offer_money" minlength="1" maxlength="100"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Tarihini Girinizz</label>
                            <input type="date" name="offer_date" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button class="btn btn-success">Teklif Kaydet</button>
                        </div>
                    </form>
                </div>
                <!-- Mesem Bitiş-->


            </div>
        </div>
    </section>

    <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace('summary_ckeditor');</script>

    <script>
        $(document).ready(function () {
            if ({{$offer->product}} == 1) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").show(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").hide(1000);
                $("#iys").hide(1000);
                $("#performans").hide(1000);
                $("#dtesvik").hide(1000);
            }

            if ({{$offer->product}} == 2) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").show(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").hide(1000);
                $("#iys").hide(1000);
                $("#performans").hide(1000);
                $("#dtesvik").hide(1000);
            }

            if ({{$offer->product}} == 3) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
                $("#egitim").show(1000);
                $("#danismanlik").hide(1000);
                $("#iys").hide(1000);
                $("#dtesvik").hide(1000);
            }

            if ({{$offer->product}} == 4) {
                $("#Bordrolama").show(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").hide(1000);
                $("#iys").hide(1000);
                $("#performans").hide(1000);
                $("#dtesvik").hide(1000);
            }

            if ({{$offer->product}} == 5) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").show(1000);
                $("#iys").hide(1000);
                $("#performans").hide(1000);
                $("#dtesvik").hide(1000);
            }

            if ({{$offer->product}} == 6) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").show(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").hide(1000);
                $("#iys").hide(1000);
                $("#performans").hide(1000);
                $("#dtesvik").hide(1000);
            }

            if ({{$offer->product}} == 7) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").hide(1000);
                $("#iys").show(1000);
                $("#performans").hide(1000);
                $("#dtesvik").hide(1000);
            }

            if ({{$offer->product}} == 9) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").hide(1000);
                $("#performans").show(1000);
                $("#iys").hide(1000);
                $("#dtesvik").hide(1000);
            }

            if ({{$offer->product}} == 10) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").show(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").hide(1000);
                $("#iys").hide(1000);
                $("#performans").hide(1000);
                $("#dtesvik").hide(1000);
            }

            if ({{$offer->product}} == 11) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").show(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").hide(1000);
                $("#iys").hide(1000);
                $("#performans").hide(1000);
                $("#dtesvik").hide(1000);
            }

            if ({{$offer->product}} == 12) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").hide(1000);
                $("#iys").hide(1000);
                $("#performans").hide(1000);
                $("#dtesvik").show(1000);
            }

            if ({{$offer->product}} == 13) {
                $("#Bordrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").show(1000);
                $("#ikmetrik").show(1000);
                $("#egitim").hide(1000);
                $("#danismanlik").hide(1000);
                $("#iys").hide(1000);
                $("#performans").hide(1000);
                $("#dtesvik").hide(1000);
            }
        });

    </script>


    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {

                    if ($(this).attr("value") == "bordro_ucret") {
                        $("#basi_ucret").show();
                        $("#net_ucrett").hide();
                        $("#bordro_type").show();
                    }

                    if ($(this).attr("value") == "net_ucret") {

                        $("#basi_ucret").hide();
                        $("#net_ucrett").show();
                        $("#bordro_type").show();
                    }
                    if ($(this).attr("value") == "seç") {

                        $("#basi_ucret").hide();
                        $("#net_ucrett").hide();
                        $("#bordro_type").hide();
                    }
                    if ($(this).attr("value") == "net_tesvik") {
                        $("#yuzdelik_tesvik").hide();
                        $("#net_tesvik").show();
                        $("#type").show();
                    }
                    if ($(this).attr("value") == "yuzdelik_tesvik") {
                        $("#yuzdelik_tesvik").show();
                        $("#net_tesvik").hide();
                        $("#type").show();
                    }
                    if ($(this).attr("value") == "Ücretsiz") {
                        $("#tesvik_yuzdelik").hide();
                        $("#net_tesvik").hide();
                        $("#type").hide();
                    }
                    if ($(this).attr("value") == "null") {
                        $("#yuzdelik_tesvik").hide();
                        $("#net_tesvik").hide();
                        $("#type").hide();
                    }
                });
            }).change();
        });
    </script>
    <!--bordro-->

    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {
                    if ($(this).attr("value") == "Aylık") {
                        $("#fixed").show();
                        $("#percentile").hide();
                        $("#tesviksy").show();
                    }
                    if ($(this).attr("value") == "Yüzdelik") {
                        $("#fixed").hide();
                        $("#percentile").show();
                        $("#tesviksy").show();
                    }
                    if ($(this).attr("value") == "null") {
                        $("#fixed").hide();
                        $("#percentile").hide();
                        $("#tesviksy").hide();
                    }
                });
            }).change();
        });
    </script>
    <!--teşvik-->

    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {
                    if ($(this).attr("value") == "Aylık") {
                        $("#sabit").show();
                        $("#yuzdelik").hide();
                        $("#tesvik_s_m").show();
                    }
                    if ($(this).attr("value") == "Yüzdelik") {
                        $("#sabit").hide();
                        $("#yuzdelik").show();
                        $("#tesvik_s_m").show();
                    }
                    if ($(this).attr("value") == "null") {
                        $("#sabit").hide();
                        $("#yuzdelik").hide();
                        $("#tesvik_s_m").hide();
                    }
                });
            }).change();
        });
    </script>
    <!--mesem-->

    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {
                    if ($(this).attr("value") == "Aylık") {
                        $("#L_aylik").show();
                        $("#L_yillik").hide();
                        $("#dkvkk_s_y").show();
                    }
                    if ($(this).attr("value") == "Yıllık") {
                        $("#L_aylik").hide();
                        $("#L_yillik").show();
                        $("#dkvkk_s_y").show();
                    }
                    if ($(this).attr("value") == "seç") {
                        $("#L_aylik").hide();
                        $("#L_yillik").hide();
                        $("#dkvkk_s_y").hide();
                    }
                });
            }).change();
        });
    </script>
    <!--dkvkk-->

    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {

                    if ($(this).attr("value") == "Aylık") {
                        $("#Month").show();
                        $("#Year").hide();
                    }
                    if ($(this).attr("value") == "Yıllık") {
                        $("#Month").hide();
                        $("#Year").show();
                    }
                    if ($(this).attr("value") == "null") {
                        $("#Month").hide();
                        $("#Year").hide();
                    }
                });
            }).change();
        });
    </script>
    <!--ikmetrik-->

    <script>
        $(document).ready(function () {
            $("select").change(function () {
                $("select option:selected").each(function () {
                    if ($(this).attr("value") == "Aylık") {
                        $("#P_aylik").show();
                        $("#P_yillik").hide();
                        $("#performans_s_p").show();
                    }
                    if ($(this).attr("value") == "Yüzdelik") {
                        $("#P_aylik").hide();
                        $("#P_yillik").show();
                        $("#performans_s_p").show();
                    }
                    if ($(this).attr("value") == "null") {
                        $("#P_aylik").hide();
                        $("#P_yillik").hide();
                        $("#performans_s_p").hide();
                    }
                });
            }).change();
        });
    </script>
    <!--performans-->

@endsection
@section('css')@endsection
@section('js')@endsection


