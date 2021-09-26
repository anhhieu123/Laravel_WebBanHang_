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
    @include('patial.content-header',['name'=>'Role', 'key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <form action="{{ route('role.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="col-md-12">
                  <div class="form-group">
                      <label >Name Role</label>
                      <input type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror"  
                        placeholder="Name Slider" value="{{old('name')}}">
                      @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <textarea name="description"cols="30" rows="5"value="{{old('display_name')}}"
                        class="form-control @error('description') is-invalid @enderror"   
                        placeholder="Description"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>                                    
            </div>
            <div class="col-md-12">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                      <h5 class="card-title">Primary card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection


