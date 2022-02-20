@extends('admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Contactos</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Contactos</li>
                            <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('employee.index')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-eye" aria-hidden="true"></i> Ver Empleados</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo Contacto</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('contact.store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <h5>Cliente: <span class="text-danger"></span></h5>
                                                        <input type="hidden" id="customer_id" name="customer_id"  value="{{ $customer->id }}" class="form-control">
                                                        <input type="text" id="customer_name" name="customer_name"  value="{{ $customer->name }}" class="form-control" disabled>
                                                        @error('customer_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xs-12">
                                                    <div class="form-group">
                                                        <h5>Nombre Contacto: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="name" name="name"  value="{{ old('name', '') }}" class="form-control">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xs-12">
                                                    <div class="form-group">
                                                        <h5>Puesto: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="position" name="position"  value="{{ old('position', '') }}" class="form-control">
                                                            @error('position')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xs-12">
                                                    <div class="form-group">
                                                        <h5>Teléfono: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="phone" name="phone"  value="{{ old('phone', '') }}" class="form-control">
                                                        @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xs-12">
                                                    <div class="form-group">
                                                        <h5>Correo: <span class="text-danger">*</span></h5>
                                                        <input type="email" id="email" name="email"  value="{{ old('email', '') }}" class="form-control">
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
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
<script type="text/javascript">
    $(document).ready(function() {
        $('input[name="branch"]').on('change', function(){
            var branch_id = $(this).val();
            if(branch_id) {
                $.ajax({
                    url: "{{  url('/ordendecompra/foliosucursal/ajax/') }}/" + branch_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="folio"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="folio"]').append('<option value="'+ value.id +'">' + value.serie + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection