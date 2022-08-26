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
                                    <option selected value="bs">Seçiniz</option>
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

                                <div id="ssabit" class="form-group col-md-5 col-sm-3 col-xs-12 col">
                                    <label for="exampleInputPassword1">Sabit Ücret : </label>
                                </div>

                                <div id="yyuzdelik" class="form-group col-md-5 col-sm-3 col-xs-12 col">
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
                </div>
                <!-- teşvik bitiş-->

                <div id="bordrolama">
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
                </div>
                <!-- kvkk bitiş-->

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


                <div  id="ikmetrik">

                    <form action="{{route('offer_update')}}" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{$offer->customer_id}}">
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
                        <input type="hidden" name="product" value="6">
                        <input type="hidden" name="new_tesvik_offer" value="new_tesvik">



                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >
                            <label for="exampleInputPassword1">Dış Kaynak/Şatışcı</label>
                            <select class="form-control" name="target_Seller_id" >
                                @foreach($sellers as $seller)
                                    <option selected value="{{$seller->id}}">{{$seller->seller_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >
                            <label for="exampleInputPassword1">İlgili Alıcı</label>
                            <input type="text" name="alici" class="form-control">
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12" >
                            <label for="exampleInputPassword1">Anlaşma Türü</label>
                            <select class="form-control" name="accept_type" >
                                <option value="null">Seçiniz</option>
                                <option value="Aylık">Aylık </option>
                                <option value="Yıllık">Yıllık</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col" >
                            <label for="exampleInputPassword1">Teklif Tarihini Giriniz</label>
                            <input type="date" name="offer_date" class="form-control" required>
                        </div>

                        <div id="month" class="form-group col-md-5 col-sm-3 col-xs-12" >
                            <label for="exampleInputPassword1">Aylık</label>
                            <select class="form-control" name="month">
                                <option selected value="">Seçiniz</option>
                                <option value="50">0-20</option>
                                <option value="5">21-300</option>
                                <option value="4">301-1000</option>
                                <option value="2">1001-5000</option>
                                <option value="1">5000+</option>
                            </select>

                            <div style="margin-top: 10px; margin-right: 15px;" class="col-md-6 col-sm-3 col-xs-12"   >
                                <label for="">Belirlenen Ücreti Giriniz</label>
                                <input class="form-control"  type="number" name="month_free">
                            </div>
                        </div>

                        <div id="year" class="form-group col-md-5 col-sm-3 col-xs-12" >
                            <label for="exampleInputPassword1">Yıllık</label>
                            <select class="form-control" name="year" >
                                <option selected value="">Seçiniz</option>
                                <option value="40">0-20</option>
                                <option value="4">21-300</option>
                                <option value="3.2">301-1000</option>
                                <option value="100000">1001-5000</option>
                                <option value="1">5000+</option>
                            </select>

                            <div style="margin-top: 10px;" class="col-md-6 col-sm-3 form-group"  >
                                <label for="">Belirlenen Ücreti Giriniz</label>
                                <input class="form-control"  type="number" name="year_free">
                            </div>
                        </div>

                        <input type="hidden" name="kdv" value="0">


                        <div class="form-group col-md-5 col-sm-3 col-xs-12 col">
                            <label for="exampleInputPassword1">Teklif Dosyası </label>
                            <input type="file" name="offer_file" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" >
                            <label for="exampleInputPassword1">Açıklama Giriniz</label>
                            <input type="text" name="explanation" class="form-control">
                        </div>

                        <div class="form-group col-md-10 col-sm-3 col-xs-12 col" align="right">
                            <button  class="btn btn-success">Teklif Kaydet</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        $(document).ready(function () {
            if ({{$offer->product}} == 1) {
                $("#bodrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").show(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
            }
            if ({{$offer->product}} == 2) {
                $("#bodrolama").hide(1000);
                $("#kvkk").show(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
            }

            if ({{$offer->product}} == 4) {
                $("#bodrolama").show(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
            }

            if ({{$offer->product}} == 6) {
                $("#bodrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").show(1000);
            }

            if ({{$offer->product}} == 10) {
                $("#bodrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").show(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
            }
            if ({{$offer->product}} == 11) {
                $("#bodrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").show(1000);
                $("#mesemtesvik").hide(1000);
                $("#ikmetrik").hide(1000);
            }

            if ({{$offer->product}} == 13) {
                $("#bodrolama").hide(1000);
                $("#kvkk").hide(1000);
                $("#tesvik").hide(1000);
                $("#ebordro").hide(1000);
                $("#dijitalkvkk").hide(1000);
                $("#mesemtesvik").show(1000);
                $("#ikmetrik").show(1000);
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
                        $("#ssabit").show();
                        $("#yyuzdelik").hide();
                        $("#tesviksy").show();
                    }
                    if ($(this).attr("value") == "Yüzdelik") {
                        $("#ssabit").hide();
                        $("#yyuzdelik").show();
                        $("#tesviksy").show();
                    }
                    if ($(this).attr("value") == "bs") {
                        $("#ssabit").hide();
                        $("#yyuzdelik").hide();
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
        $(document).ready(function(){
            $("select").change(function(){
                $( "select option:selected").each(function(){

                    if($(this).attr("value")=="Aylık"){
                        $("#month").show();
                        $("#year").hide();
                    }
                    if($(this).attr("value")=="Yıllık"){

                        $("#month").hide();
                        $("#year").show();
                    }
                    if($(this).attr("value")=="null"){
                        $("#month").hide();
                        $("#year").hide();
                    }
                });
            }).change();
        });
    </script>
    <!--ikmetrik-->

@endsection
@section('css')@endsection
@section('js')@endsection

