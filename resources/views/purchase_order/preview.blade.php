@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Orden de Compra</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Orden de Compra</li>
                            <li class="breadcrumb-item active" aria-current="page">Previo</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (count(Cart::content()))
        <a name="delete" href="{{route('purchase_order.delete')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-trash" aria-hidden="true"></i> Cancelar Orden de Compra</a>
        @else
        <a href="#" class="btn btn-danger btn-sm float-left disabled"><i class="fa fa-trash" aria-hidden="true"></i> Cancelar Orden de Compra</a>
        @endif
        <a href="{{route('product.index')}}" class="btn btn-danger btn-sm float-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Productos</a>
        
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orden de Compra por: {{\Cart::total()}}</h3>
                        <div class="float-right">
                        <a href="{{ route('purchase_order.create')}}" style="border-radius: 60px;" class="btn btn-info">Generar</a>
                        </div>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            @if (count(Cart::content()))
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td><form action="{{route('purchase_order.editItem',$item->rowId)}}"><input style="width:60px;" type="number" name="quantity" id="" value="{{ $item->qty }}"> <input style="color:#fff; background:#64bac2;" type="submit" value="&#xf021" class="fa fa-refresh btn btn-circle btn-danger ml-5"></form></td>
                                        <td>{{ $item->total }}</td>

                                        <td>
                                            <a class="btn btn-circle btn-danger mb-5" name="delete" href="{{route('purchase_order.removeItem',$item->rowId)}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                    <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Total</th>
                                    <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            @else
                            <div class="alert alert-custom text-center m-0" role="alert">
                                <b>No hay Orden de Compra Generada</b>.
                            </div>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection