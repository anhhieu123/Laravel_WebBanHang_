@extends('layouts.admin')

@section('title')
    <title> Trang chu </title>
@endsection

@section('css')
<link href="{{ asset('admins/slider/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Slider', 'key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('slider.update',['id'=>$slider->id]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label >Name Slider</label>
                      <input type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror"  
                        placeholder="Name Slider" value="{{$slider->name}}">
                      @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <textarea name="description"cols="30" rows="5"
                        class="form-control @error('description') is-invalid @enderror"   
                        placeholder="Description">{{$slider->description}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Image</label>
                        <input type="file" name="image_path" 
                         class="form-control-file @error('image_path') is-invalid @enderror" >
                         <div class="col-md-4">
                             <div class="row">
                                 <img src="{{$slider->image_path}}" />
                             </div>
                         </div>
                         @error('image_path')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection


