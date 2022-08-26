@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-tittle with-border">
                <h2 class="box-title" style="margin-left: 10px">İşlemler</h2>
            </div>

            <div align="right">
                    <a href="{{route('email_create')}}"><button class="btn btn-success" >Yeni Müşteri Ekle</button></a>
            </div>

            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Müşteri</th>
                        <th>Yetkili</th>
                        <th>cep</th>
                        <th>Sabit Telefon</th>
                        <th>E-Posta</th>
                        <th>Durumu</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($customer_emails))
                        <?php $say=1;?>
                    @endif
                    @foreach($customer_emails as $email)
                        <tr>
                            <td><?php echo $say++ ?></td>
                            <td>{{$email->customers->name}}</td>
                            <td>{{$email->customer_official}}</td>
                            <td>{{$email->mobile}}</td>
                            <td>{{$email->phone}}</td>
                            <td>{{$email->email}}</td>
                            <td>@if($email->is_deleted==0)
                                    <span class="label label-primary">Aktif</span>
                                @else
                                    <span class="label label-danger">Pasif</span>
                            </td>
                            @endif
                            <td><a href="{{route('email_edit',['id' => $email->id])}}"><button type="button" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></a></td>

                            @if($email->is_deleted==0)
                                <td><a href="{{route('email_destroy', ['id' => $email->id])}}"><button type="button" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button></a> </td>
                            @else
                                <td><a href="{{route('email_destroy', ['id' => $email->id])}}"><button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok"></span></button></a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : false,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        })

    </script>


@endsection

@section('css')@endsection
@section('js')@endsection

