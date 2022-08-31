@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-danger">
            <div class="box-header with-border">
            </div>
            <table id="myTable" class="display">
                <thead>
                <tr>
                    <th>Firma Adı</th>
                    <th>Teklif Tarihi</th>
                    <th>Teklif Veren</th>
                    <th>1 gün içinde Arama</th>
                    <th>1.hafta içinde arama</th>
                    <th>2.hafta içinde arama</th>
                </tr>
                </thead>

                <tbody>
                @foreach($notifications as $notification)
                    <td>{{isset($notification->customer->name) ? $notification->customer->name : null }}</td>
                    <td>{{$notification->offer_save_date->format('d.m.Y')}}</td>
                    <td>{{$notification->user->name}}</td>
                    <td>
                        @if($notification->type_1_day==0)
                            <img src="https://img.icons8.com/color/28/000000/cancel-2--v1.png"/>
                        @elseif($notification->type_1_day==2)
                            <img src="https://img.icons8.com/fluent/28/000000/checkmark.png"/>
                        @else
                            <img src="https://img.icons8.com/color/48/000000/data-pending.png"/>
                        @endif
                    </td>
                    <td>
                        @if($notification->type_7_day==0)
                            <img src="https://img.icons8.com/color/28/000000/cancel-2--v1.png"/>
                        @elseif($notification->type_7_day==2)
                            <img src="https://img.icons8.com/fluent/28/000000/checkmark.png"/>
                        @else
                            <img src="https://img.icons8.com/color/48/000000/data-pending.png"/>
                        @endif
                    </td>

                    <td>
                        @if($notification->type_14_day==0)
                            <img src="https://img.icons8.com/color/28/000000/cancel-2--v1.png"/>
                        @elseif($notification->type_14_day==2)
                            <img src="https://img.icons8.com/fluent/28/000000/checkmark.png"/>
                        @else
                            <img src="https://img.icons8.com/color/48/000000/data-pending.png"/>
                        @endif
                    </td>


                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </section>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection
@section('css')@endsection
@section('js')@endsection
