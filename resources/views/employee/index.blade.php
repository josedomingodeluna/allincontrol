@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Empleados</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Empleados</li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('employee.create')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Empleado</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Empleados Registradas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Teléfono</th>
                                        <th>CURP</th>
                                        <th>RFC</th>
                                        <th>NSS</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->date_of_birth}}</td>
                                    <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                                    <td>{{$employee->address}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->curp}}</td>
                                    <td>{{$employee->rfc}}</td>
                                    <td>{{$employee->nss}}</td>
                                    <td>
                                        <a class="btn btn-circle btn-danger mb-5" name="edit" href="{{ route('employee.edit',$employee->id)}}"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-circle btn-danger mb-5" name="delete" href="{{ route('employee.destroy',$employee->id)}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Teléfono</th>
                                        <th>CURP</th>
                                        <th>RFC</th>
                                        <th>NSS</th>
                                        <th></th>
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