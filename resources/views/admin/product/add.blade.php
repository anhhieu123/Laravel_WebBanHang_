@extends('layouts.admin')

@section('title')
    <title> Add Product </title>
@endsection
@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('patial.content-header',['name'=>'Product', 'key'=>'Add'])
    <!-- /.content-header -->
    {{-- <div class="col-md-12">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
    </div> --}}

    <!-- Main content -->
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
               
                    <div class="form-group">
                      <label >Name Product</label>
                      <input type="text" name="names"   
                      class="form-control @error('names') is-invalid @enderror"  
                       placeholder="Name Product">
                       @error('names')
                            <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label >Price Product</label>
                      <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"   placeholder="Price Product">
                      @error('price')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label >Image Product</label>
                      <input type="file"  name="feature_img_path" class="form-control-file " >
                  </div>

                    <div class="form-group">
                      <label >Image Details Product</label>
                      <input type="file" multiple name="image_path[]" class="form-control-file" >
                    </div>

                    <div class="form-group">
                        <label >Category Name</label>
                        <select   name="category_id" class="form-control select2_init" >
                          <option value="0">Select Category</option>
                          {!!$htmlOption!!}
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Tag Product</label>
                        <select name="tag1s[]" multiple class="form-control tag_select_choose" >
                        </select>
                    </div>                                      
            </div>
            <div class="div col-md-12">
                <div class="form-group">
                    <label for="Content">Content Product</label>
                    <textarea class="form-control tinymce_editor_init @error('contents') is-invalid @enderror" name="contents" rows="8"></textarea>
                </div>
            </div>
            <div class="div col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>                              
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</form>
    <!-- /.content -->
  </div>
@endsection


@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/0mcotygwlq40d63a919lb4z36ljh5zxyvhox65ig1hm96h37/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>  
@endsection