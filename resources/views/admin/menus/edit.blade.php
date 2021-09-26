@extends('layouts.admin')

@section('title')
    <title> Trang chu </title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Menu', 'key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('menus.update',['id'=>$menuFolowEdit->id]) }}" method="post">
                  @csrf
                    <div class="form-group">
                      <label >Name Menus</label>
                      <input type="text" name="name" class="form-control" value="{{$menuFolowEdit->name}}"  placeholder="Name Menu">
                    </div>
                    <div class="form-group">
                        <label >Parent Name Menu</label>
                        <select   name="parent_id" class="form-control" >
                          <option value="0">Select parent menu</option>
                          {{!! $optionSelect !!}}
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


