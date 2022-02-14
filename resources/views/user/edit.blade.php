@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Usuarios</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Usuarios</li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Usuarios</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                            <form method="POST" action="{{route('user.update',$user->id)}}">
                            @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Nombre: <span class="text-danger">*</span></h5>
                                                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Email: <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}">
                                                        @error('phone')
                                                        <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Rol:</h5>
                                                        <select name="role" id="role" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disabled="disabled">Selecciona</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{$role->name}}">{{$role->name}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('role')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                @if(Auth::user()->id == $user->id)
                                                <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Contraseña actual<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="current_password" name="current_password" class="form-control">
                                                        @error('current_password')
                                                        <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Contraseña <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="password" name="password" class="form-control">
                                                        @error('password')
                                                        <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Confirmar Contraseña <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                                        @error('password_confirmation')
                                                        <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
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