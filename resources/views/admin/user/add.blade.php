@extends('layouts.admin')

@section('title')
    <title> Trang chu </title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />

@endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Slider', 'key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label >Name User</label>
                      <input type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror"  
                        placeholder="Name User" value="{{old('name')}}">
                      @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label >Email</label>
                      <input type="text" name="email"
                       class="form-control @error('email') is-invalid @enderror"  
                        placeholder="Name Email" value="{{old('email')}}">
                      @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label >Password</label>
                      <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror"  
                        placeholder=" Password" value="{{old('password')}}">
                      @error('password')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label >Select Role</label>
                      <select   name="role_id[]" class="form-control select2_init" multiple  >
                        <option value=""></option>
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                      </select>
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
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/0mcotygwlq40d63a919lb4z36ljh5zxyvhox65ig1hm96h37/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>  
@endsection


