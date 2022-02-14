@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Folios</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Folios</li>
                            <li class="breadcrumb-item active" aria-current="page">Todo</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('folio.index')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-plus" aria-hidden="true"></i> Ver Sucursales</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Registrar Folio</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('folio.store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Sucursal: <span class="text-danger">*</span></h5>
                                                        <select name="branch" id="branch" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disable="">Selecciona</option>
                                                            @foreach($branches as $branch)
                                                                <option value="{{$branch->id}}">{{$branch->name}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('branch')
                                                            <span class="text-danger">{{ $message }} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Serie: <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" id="serie" name="serie" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                                                            @error('serie')
                                                            <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Folio: <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" id="folio" name="folio" class="form-control">
                                                            @error('folio')
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