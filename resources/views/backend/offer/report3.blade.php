<table border="1">
    <thead>
    <tr>
        <th style="height: 60px; width: 10px; background-color: #c0c0c0; text-align: center"><strong>SIRA</strong></th>
        <th style="height: 60px; width: 20px; background-color: #c0c0c0; text-align: center"><strong>TARİH</strong></th>
        <th style="height: 60px; width: 25px; background-color: #c0c0c0; text-align: center"><strong>ULAŞIM KANALI</strong></th>
        <th style="height: 60px; width: 15px; background-color: #c0c0c0; text-align: center"><strong>HİZMET</strong></th>
        <th style="height: 60px; width: 60px; background-color: #c0c0c0; text-align: center"><strong>FİRMA ADI</strong></th>
        <th style="height: 60px; width: 20px; background-color: #c0c0c0; text-align: center"><strong>ÇALIŞAN SAYISI</strong></th>
        <th style="height: 60px; width: 25px; background-color: #c0c0c0; text-align: center"><strong>İLGİLİ KİŞİ AD SOYAD</strong></th>
        <th style="height: 60px; width: 15px; background-color: #c0c0c0; text-align: center"><strong>TELEFON-1</strong></th>
        <th style="height: 60px; width: 15px; background-color: #c0c0c0; text-align: center"><strong>TELEFON-2</strong></th>
        <th style="height: 60px; width: 15px; background-color: #c0c0c0; text-align: center"><strong>FİYAT</strong></th>
        <th style="height: 60px; width: 30px; background-color: #c0c0c0; text-align: center"><strong>KABUL EDİLDİ / BEKLİYOR</strong></th>
        <th style="height: 60px; width: 80px; background-color: #c0c0c0; text-align: center"><strong>AÇIKLAMA</strong></th>
    </tr>
    </thead>
    @php
        $say = 1;
    @endphp
    @foreach($offers as $offer)
        <tbody>
        <tr>
            <td>{{$say++}}</td>
            <td>{{date("d-m-Y",strtotime(substr($offer->offer_date,0,10)))}}</td>
            <td>{{$offer->seller->seller_name}}</td>
            <td>{{$offer->products->name}}</td>
            <td>{{$offer->customer->name}}</td>
            <td></td>
            <td>{{$offer->customer_emails->customer_official}}</td>
            <td>{{$offer->customer_emails->mobile}}</td>
            <td>{{$offer->customer_emails->phone}}</td>
            <td>{{$offer->offer_money}}</td>
            <td>
                @if($offer->offer_status == 0)
                    Reddedildi
                @elseif($offer->offer_status == 1)
                    Bekliyor
                @elseif($offer->offer_status == 2)
                    Kabul Edildi
                @endif
            </td>
            <td>{{$offer->explanation->explanation}}</td>
        </tr>
        </tbody>
    @endforeach
</table>
