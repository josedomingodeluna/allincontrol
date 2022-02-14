@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Ordenes de Compra</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Ordenes de Compra</li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (count(Cart::content()))
        <a href="{{route('purchase_order.preview')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-eye" aria-hidden="true"></i> ver Orden de Compra</a>
        @else
        <a href="#" class="btn btn-danger btn-sm float-left disabled"><i class="fa fa-eye" aria-hidden="true"></i> Cancelar Orden de Compra</a>
        @endif
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ordenes de Compra Registradas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Sucursal</th>
                                        <th scope="col">Folio</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchase_orders as $purchase_order)
                                    <tr>
                                        <td>{{ $purchase_order->id }}</td>
                                        <td>{{ $purchase_order->user_id }}</td>
                                        <td>{{ $purchase_order->branch_id }}</td>
                                        <td>{{ $purchase_order->folio_id }}</td>
                                        <td>{{ $purchase_order->customer_id }}</td>
                                        <td>{{ $purchase_order->total }}</td>
                                        <td><a class="btn btn-circle btn-danger" name="" href="{{ route('purchase_order.print', $purchase_order->id) }}"><i class="fa fa-print"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Sucursal</th>
                                        <th scope="col">Folio</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection