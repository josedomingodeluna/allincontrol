@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Datos</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Datos</li>
                            <li class="breadcrumb-item active" aria-current="page">Documento</li>
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
                        <h3 class="box-title">Datos Registrados</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Porcentaje</th>
                                <th>Descripción</th>
                                <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($documents_data as $document_data)
                                    <tr>
                                        <td>{{$document_data->document_id}}</td>
                                        <td><img src="{{ asset($document_data->logo)}}" style="height:40px; width:60px;" alt=""></td>
                                        <td><img src="{{ asset($document_data->image)}}" style="height:40px; width:60px;" alt=""></td>
                                        <td>{{$document_data->slogan}}</td>
                                        <td>{{$document_data->agreements}}</td>
                                        <td>
                                            <a class="btn btn-circle btn-danger mb-5" name="delete" href="{{ route('document_data.destroy',$document_data->id)}}"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-circle btn-danger mb-5" name="delete" href="{{ route('document_data.destroy',$document_data->id)}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Nombre</th>
                                    <th>Porcentaje</th>
                                    <th>Descripción</th>
                                    <th>Opciones</th>
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