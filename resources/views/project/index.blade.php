@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Productos</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Productos</li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <a href="{{route('project.create')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Proyecto</a>
        @if (count(Cart::content()))
        <a href="{{route('purchase_order.preview')}}" class="btn btn-danger btn-sm float-right"><i class="fa fa-eye" aria-hidden="true"></i> Ver Orden de Compra</a>
        @else
        <a href="" class="btn btn-danger btn-sm float-right disabled"><i class="fa fa-eye" aria-hidden="true"></i> Ver Orden de Compra</a>
        @endif
        
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Proyecto Registrados</h3>
            </div>
            <div class="ml-10">
                <form class="mt-5" action="{{route('project.import')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="btn btn-sm" type="file" name="import_file" id="import_file">
                    <input type="submit" value="&#xf093" class="fa fa-upload btn btn-sm btn-info">
                    <br>
                    @error('import_file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                
                </form>
            </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio de Compra</th>
                        <th>Precio de Venta</th>
                        <th>Existencia minima</th>
                        <!-- <th>Descripción</th> -->
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{$project->code}}</td>
                            <td>{{$project->name}}</td>
                            <td>{{$project->category}}</td>
                            <td>{{$project->purchase_price}}</td>
                            <td>{{$project->sale_price}}</td>
                            <td>{{$project->minstock}}</td>
                            <!-- <td>{{$project->description}}</td> -->
                            <td>
                                <span><a class="btn btn-circle btn-danger mb-5" href="{{ route('purchase_order.addItem',  ['id' => $project->id, 'name' => $project->name, 'price' => $project->sale_price]) }}"><i class="fa fa-shopping-bag"></i></a></span>
                            </td>
                            <td>
                                <a class="btn btn-circle btn-danger mb-5" name="edit" href="{{ route('product.edit',$project->id)}}"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-circle btn-danger mb-5" name="delete" href="{{ route('product.destroy',$project->id)}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio de Compra</th>
                        <th>Precio de Venta</th>
                        <th>Existencia minima</th>
                        <!-- <th>Descripción</th> -->
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection