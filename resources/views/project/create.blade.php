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
                            <li class="breadcrumb-item" aria-current="page">Proyectos</li>
                            <li class="breadcrumb-item active" aria-current="page">Registro</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('project.index')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-eye" aria-hidden="true"></i> Ver Proyectos</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo Proyecto</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('project.store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <h5>Codigo:</h5>
                                                        <input type="text" id="code" name="code" value="{{old('code', '')}}" class="form-control">
                                                        @error('code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>Nombre: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="name" name="name" value="{{old('name', '')}}" class="form-control">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Categoria: <span class="text-danger">*</span></h5>
                                                        <select name="category" id="category" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disable="">Selecciona</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('category')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <h5>Presupuesto:</h5>
                                                        <input type="number" step="0.01" id="budget" name="budget" value="{{old('budget', '')}}" class="form-control">
                                                            @error('budget')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                    <h5>Descripción: </h5>
                                                        <textarea name="description" id="description" class="form-control" placeholder="Descripción del proyecto" aria-invalid="false">{{old('description', '')}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12" style="padding:5px">
                                                <span class="text-danger">*</span> Campos Obligtorios
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