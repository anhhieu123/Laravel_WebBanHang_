@extends('layouts.admin')

@section('title')
    <title> Trang chu </title>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('admins/main.js')}}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Setting', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                      ADD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('setting.create').'?type=Text' }}">Text</a></li>
                      <li><a href="{{ route('setting.create').'?type=Textarea' }}">Textarea</a></li>
                    </ul>
                  </div>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Config key</th>
                        <th scope="col">Config value</th>
                        <th scope="col">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $settings as $setting)
                            <tr>
                                <th scope="row">{{$setting->id}}</th>
                                <td>{{$setting->config_key}}</td>
                                <td>{{$setting->config_value}}</td>
                                <td>
                                    <a href="{{ route('setting.edit',['id'=>$setting->id]).'?type=' . $setting->type }}" class="btn btn-default">EDIT </a>
                                    <a href="" data-url="{{route('setting.delete',['id'=>$setting->id])}}"
                                     class="btn btn-danger action_delete"> DEL </a>
                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{ $settings->links () }}
            </div>
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection


