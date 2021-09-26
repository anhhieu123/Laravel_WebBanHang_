@extends('layouts.admin')

@section('title')
    <title> Trang chu </title>
@endsection
@section('css')
<link href="{{ asset('admins/slider/add/add.css') }}" rel="stylesheet" />
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('admins/main.js')}}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'User', 'key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('user.create')}}" class="btn btn-success float-right m-2" > ADD </a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name </th>
                        <th scope="col">Email </th>

                        <th scope="col">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{ route('user.edit',['id'=>$user->id]) }}" class="btn btn-default">EDIT </a>
                                    <a href="" data-url="{{route('user.delete',['id'=>$user->id])}}"
                                        class="btn btn-danger action_delete"> DEL </a>
                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{ $users->links () }}
            </div>
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection


