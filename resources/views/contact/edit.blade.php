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
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('employee.index')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-eye" aria-hidden="true"></i> Ver Empleados</a>
        <a href="{{route('employee.index')}}" class="btn btn-danger btn-sm float-right"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Empleado</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Empleado</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('employee.update', $employee->id)}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>Fecha de Nacimiento: <span class="text-danger">*</span></h5>
                                                        <input type="date" id="date_of_birth" name="date_of_birth"  value="{{$employee->date_of_birth}}" class="form-control">
                                                        @error('date_of_birth')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>Nombre: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="first_name" name="first_name" value="{{$employee->first_name}}" class="form-control">
                                                        @error('first_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>Apellido: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="last_name" name="last_name" value="{{$employee->last_name}}" class="form-control">
                                                        @error('last_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Dirección:</h5>
                                                        <input type="text" id="address" name="address" value="{{$employee->address}}" class="form-control">
                                                            @error('address')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Teléfono: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="phone" name="phone" value="{{$employee->phone}}" class="form-control">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>CURP:</h5>
                                                        <input type="text" id="curp" name="curp" value="{{$employee->curp}}" class="form-control">
                                                        @error('curp')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>RFC: <span class="text-danger">*</span></h5></h5>
                                                        <input type="text" id="rfc" name="rfc" value="{{$employee->rfc}}" class="form-control">
                                                        @error('rfc')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>NSS: <span class="text-danger"></span></h5></h5>
                                                        <input type="text" id="nss" name="nss"  value="{{$employee->nss}}" class="form-control"  onkeyup="this.value = this.value.toUpperCase();">
                                                        @error('nss')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Actualizar">
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->       
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection