@extends('layouts.admin')

@section('title')
    <title> Trang chu </title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Menu', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('menus.create') }}" class="btn btn-success float-right m-2" > ADD </a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Menu</th>
                        <th scope="col">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $menu as $menus)
                            <tr>
                                <th scope="row">{{$menus->id}}</th>
                                <td>{{$menus->name}}</td>
                                <td>
                                    <a href="{{ route('menus.edit',['id'=>$menus->id]) }}" class="btn btn-default">EDIT </a>
                                    <a href="{{ route('menus.delete',['id'=>$menus->id]) }}" class="btn btn-danger"> DEL </a>
                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{ $menu->links () }}
            </div>
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection


