@extends('layouts.admin')

@section('title')
    <title> Trang chu </title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Setting', 'key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('setting.store') . '?type=' . request()->type }}" method="post">
                  @csrf
                    <div class="form-group">
                      <label >Config key</label>
                      <input type="text" name="config_key" 
                      class="form-control @error('config_key') is-invalid @enderror"   placeholder="Config key">
                    </div>
                    @if (request() ->type === 'Text')
                    <div class="form-group">
                        <label >Config value</label>
                        <input type="text" name="config_value" 
                        class="form-control @error('config_value') is-invalid @enderror"   placeholder="Config value">
                      </div>                         
                    @elseif(request() ->type === 'Textarea')
                      <div class="form-group">
                        <label >Config value</label>
                        <textarea name="config_value"  class="form-control @error('config_value') is-invalid @enderror" cols="30"
                         rows="5" placeholder="Config value" ></textarea>
                      </div> 
                    @endif
                    
                    
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


