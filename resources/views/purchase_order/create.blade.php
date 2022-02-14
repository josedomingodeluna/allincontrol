@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Ordenes de Compra</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Ordenes de Compra</li>
                            <li class="breadcrumb-item active" aria-current="page">Registro</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <a href="{{route('product.index')}}" class="btn btn-danger btn-sm float-left"><i class="fa fa-eye" aria-hidden="true"></i> Ver Productos</a>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nueva Orden de Compra</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('purchase_order.store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>Sucursal: <span class="text-danger">*</span></h5>
                                                        <select name="branch" id="branch" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disabled="disabled">Selecciona</option>
                                                            @foreach($branches as $branch)
                                                                <option value="{{$branch->id}}">{{$branch->name}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('branch')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>Folio: <span class="text-danger">*</span></h5>
                                                        <select name="folio" id="folio" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disable="">Selecciona</option>
                                                            @foreach($folios as $folio)
                                                                <option value="{{$folio->folio}}">{{$folio->serie}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('folio')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Cliente: <span class="text-danger">*</span></h5>
                                                        <select name="customer" id="customer" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disable="">Selecciona</option>
                                                            @foreach($customers as $customer)
                                                                <option value="{{$customer->id}}">{{$customer->first_name.' '.$customer->last_name}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('customers')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                        input[disabled='disabled']::-ms-value {
                                            color: #000;
                                        }

                                    </style>
                                    <div class="text-xs-right">
                                        @if (count(\Cart::content()))
                                            <input type="submit" class="btn btn-rounded btn-info" value="Guardar">
                                        @else
                                            <input style="pointer-events: none;" type="submit" class="btn btn-rounded btn-info btn-disabled" value="Guardar" disabled>
                                        @endif                                        
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
        $('select[name="branch"]').on('change', function(){
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