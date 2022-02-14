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
                        <h3 class="box-title">Datos Documento</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Basic Forms -->
                        <div class="row">
                            <div class="col">
                                <form method="POST" enctype="multipart/form-data" action="{{route('document_data.store')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-sd-12 col-md-12">
                                                    <div class="form-group">
                                                        <h5>Documento: <span class="text-danger">*</span></h5>
                                                        <select name="document_id" id="document_id" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disabled="disabled">Selecciona</option>
                                                            @foreach($documents as $document)
                                                                <option value="{{$document->id}}">{{$document->name}}</option>   
                                                            @endforeach
                                                        </select>
                                                        @error('branch')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <div class="form-group">
                                                        <h5>Logo: <span class="text-danger">*</span></h5>
                                                        <input type="file" id="logo" name="logo" class="form-control">
                                                        @error('logo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <div class="form-group">
                                                        <h5>Imagen: <span class="text-danger">*</span></h5>
                                                        <input type="file" id="image" name="image" class="form-control">
                                                        @error('image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sd-12 col-md-6">
                                                    <div class="form-group">
                                                        <img id="showLogo" src="{{asset('img/defaults/no-image.jpg')}}" style="width:360px; height:200px;" >
                                                    </div>
                                                </div>
                                                
                                                <div class="col-6 col-sd-12 col-md-6">
                                                    <div class="form-group">
                                                        <img id="showImage" src="{{asset('img/defaults/no-image.jpg')}}" style="width:360px; height:200px;" >
                                                    </div>
                                                </div>                                              
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Slogan: <span class="text-danger">*</span></h5>
                                                        <input type="text" id="slogan" name="slogan" value="{{old('slogan')}}" class="form-control" required="">
                                                        @error('slogan')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                    <h5>Acuerdos: <span class="text-danger">*</span></h5>
                                                        <textarea name="agreements" id="agreements" class="form-control" aria-invalid="false">{{{ old('agreements') }}}</textarea>
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
	$(document).ready(function(){
		$('#logo').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showLogo').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
    $(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endsection