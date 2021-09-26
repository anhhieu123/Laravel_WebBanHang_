@extends('layouts.admin')

@section('title')
    <title> Trang chu </title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Category', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2" > ADD </a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $cate)
                            <tr>
                                <th scope="row">{{$cate->id}}</th>
                                <td>{{$cate->name}}</td>
                                <td>
                                    <a href="{{ route('categories.edit',['id'=>$cate->id]) }}" class="btn btn-default">EDIT </a>
                                    <a href="{{ route('categories.delete',['id'=>$cate->id]) }}" class="btn btn-danger"> DEL </a>
                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{ $category->links () }}
            </div>
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection


