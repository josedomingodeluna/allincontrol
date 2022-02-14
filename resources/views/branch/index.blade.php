@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Sucursales</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Sucursales</li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('branch.create')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Sucursal</a>
        <a href="{{route('folio.create')}}" class="btn btn-danger btn-sm float-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Folio</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sucursales Registradas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Correo Atencíon</th>
                                        <th>Correo Ventas</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($branches as $branch)
                                <tr>
                                    <td>{{$branch->name}}</td>
                                    <td>{{$branch->address}}</td>
                                    <td>{{$branch->phone}}</td>
                                    <td>{{$branch->email_cs}}</td>
                                    <td>{{$branch->email_s}}</td>
                                    <td>
                                        <a class="btn btn-circle btn-danger mb-5" name="edit" href="{{ route('branch.edit',$branch->id)}}"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-circle btn-danger mb-5" name="delete" href="{{ route('branch.destroy',$branch->id)}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Correo Atencíon</th>
                                        <th>Correo Ventas</th>
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