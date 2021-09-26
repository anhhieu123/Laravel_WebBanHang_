@extends('layouts.admin')

@section('title')
    <title> Trang chủ </title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Home', 'key'=>''])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2" > ADD </a>
            </div>
            <div class="col-md-12">
              Trang admin
            </div>
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection


