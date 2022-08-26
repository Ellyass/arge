@extends('backend.layout')
@section('content')
    <link  href="https://code.jquery.com/jquery-3.5.1.js">
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4>Para Verilen Personeller</h4>
            </div>
            <div class="box-header with-border">


{{--                <div align="right"><a href="{{route('cost_create')}}"><button class="btn btn-success btn-xs">Masraf Ekle</button></a></div>--}}

                <table id="paginationNumbers" class="table" width="100%">
                    <?php
                    $say=1;
                    ?>
                    <thead>
                    <tr>
                        <th scope="col">Sıra</th>
                        <th scope="col">Personel</th>
                        <th scope="col">Aldığı Miktar</th>
                        <th scope="col">Sebep</th>
                        <th scope="col">Tarih</th>
                        <th scope="col">Bildirim</th>
                        <th>Durum</th>
                        <th>Sil</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costs  as $cost)
                        <tr>

                            <th scope="row"><?php echo $say++?></th>
                            <td>{{$cost->user->name}}</td>
                            <td>{{$cost->cost_money}}</td>
                            <td>{{$cost->cost_explanation}}</td>
                            <td>{{$cost->cost_date}}</td>
                            <td>@if($cost->cost_status==0)
                                    <button class="btn btn-warning btn-xs">Bekleniyor</button>
{{--                                @else--}}
{{--                                    <a href="{{route('form.show',['id'=>$cost->id])}}">  <button class="btn btn-success btn-xs">Form Yüklendi</button></a>--}}
                                @endif

                            </td>
                            <td> @if($cost->end_status==1)
                                    <button class="btn btn-warning btn-xs">Bekleniyor</button>
                                @elseif($cost->end_status==2)
                                    <button class="btn btn-success btn-xs">Kabul Edildi</button>
                                @elseif($cost->end_status==0)
                                    <button class="btn btn-danger btn-xs">Reddedildi</button>
                                @endif</td>

                            <td>

{{--                                <form  id="costDelete{{ $cost->id }}" action="{{route('cost.delete',['id' => $cost->id])}}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    <button  id="{{$cost->id}}"  type="button" class="btn btn-danger sil">Sil</button>--}}
{{--                                </form>--}}

                            </td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
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

    <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->

    <script src="/backend/dist/js/adminlte.min.js"></script>
    <script src = "/backend/bower_components/bootstrap/js/SweetAlert.min.js"></script >
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>


        $('.sil').click(function () {
            var id = $(this).attr('id');
            console.log(id);

            swal({
                title: "Silmek İstediğinize Eminmisiniz?",
                text: "Silme İşlemi geri alınamaz",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#costDelete"+id).submit();
                        swal("Silme İşlemi Başarılı", {
                            icon: "success",
                        });
                    } else {
                        swal("Silme İşlemi Başarısız!");
                    }
                });
        });
    </script>

@endsection
@section('css')@endsection
@section('js')@endsection
