@extends('layouts.admin')

@section('title')
    <title> Trang chu </title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Category', 'key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('categories.update',['id'=>$category->id]) }}" method="post">
                  @csrf
                    <div class="form-group">
                      <label >Name Category</label>
                      <input type="text" name="name" class="form-control" value="{{$category->name}}"  placeholder="Name Category">
                    </div>
                    <div class="form-group">
                        <label >Parent Name</label>
                        <select  name="parent_id" class="form-control" >
                          <option value="0" >Chon danh muc cha</option>
                          {!!$htmlOption!!}
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


