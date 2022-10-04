@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-tittle with-border">
                <h2 class="box-title" style="margin-left: 10px">İşlemler</h2>
            </div>

            <div align="right">
                <a href="{{route('customer_add')}}">
                    <button class="btn btn-success">Yeni Müşteri Ekle</button>
                </a>
            </div>

            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Müşteri</th>
                        <th>Müşteri Tipi</th>
                        <th>Müşteri Türü</th>
                        <th>Durumu</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>
                                @foreach($customer->customer_types as $customer_type)
                                    <span
                                        class=" label label-primary">{{config('variables.customers.types')[$customer_type->type]}}</span>
                                @endforeach
                            </td>

                            <td>
                                <span
                                    class="label label-warning">{{config('variables.customers.status')[$customer->status]}}
                                </span>
                            </td>

                            <td>@if($customer->is_deleted==0)
                                    <span class="label label-primary">Aktif</span>
                                @else
                                    <span class="label label-danger">Pasif</span>
                            </td>
                            @endif
                            <td><a href="{{route('customer_edit',['id' => $customer->id])}}">
                                    <button type="button" class="btn btn-info btn-sm"><span
                                            class="glyphicon glyphicon-pencil"></span></button>
                                </a>
                            </td>

                            @if($customer->is_deleted==0)
                                <td><a href="{{route('customer_destroy', ['id' => $customer->id])}}">
                                        <button type="button" class="btn btn-danger btn-sm"><span
                                                class="fa fa-trash"></span></button>
                                    </a>
                                </td>
                            @else
                                <td><a href="{{route('customer_destroy', ['id' => $customer->id])}}">
                                        <button type="button" class="btn btn-success btn-sm"><span
                                                class="glyphicon glyphicon-ok"></span></button>
                                    </a>
                                </td>
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

