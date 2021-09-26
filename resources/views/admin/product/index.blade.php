@extends('layouts.admin')

@section('title')
    <title> List Product </title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/index/index.css')}}">
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('admins/main.js')}}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Product', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2" > ADD </a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $prod)
                            <tr>
                                <th scope="row">{{$prod->id}}</th>
                                <td>{{$prod->name}}</td>
                                <td>{{number_format($prod->price)}}</td>
                                <td>{{$prod->name}}</td>
                                <td> <img class="image_pro" src="{{$prod->feature_img_path}}" /></td>
                                <td>{{optional($prod->category) ->name}}</td>

                                <td>
                                    <a href="{{ route('product.edit',['id'=>$prod->id]) }}" class="btn btn-default">EDIT </a>
                                    <a data-url = "{{route('product.delete',['id'=>$prod->id])}}" class="btn btn-danger action_delete"> DEL </a>
                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
               
            </div>
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection


