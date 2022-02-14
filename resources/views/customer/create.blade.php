@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Clientes</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Clientes</li>
                            <li class="breadcrumb-item active" aria-current="page">Registro</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('customer.index')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-plus" aria-hidden="true"></i> Ver Clientes</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo Cliente</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('customer.store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Nombre: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="first_name" name="first_name" class="form-control">
                                                        @error('first_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Apellidos: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="last_name" name="last_name" class="form-control">
                                                        @error('last_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                </div> 
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>RFC: </h5>
                                                        <input type="text" id="rfc" name="rfc" class="form-control">
                                                        @error('rfc')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Correo: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="email" name="email" class="form-control">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> 
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Teléfono: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="phone" name="phone" class="form-control">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                                                           
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>CP: </h5>
                                                        <input type="text" id="zip" name="zip" class="form-control">
                                                        @error('zip')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <h5>Dirección: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="address" name="address" class="form-control">
                                                            @error('address')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                    <h5>Notas: <span class="text-danger"></span></h5>
                                                        <textarea name="notes" id="notes" class="form-control" placeholder="Textarea text" aria-invalid="false"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Guardar">
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