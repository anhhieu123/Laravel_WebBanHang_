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
    @include('patial.content-header',['name'=>'Product', 'key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route('product.update',['id'=>$products->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
               
                    <div class="form-group">
                      <label >Name Product</label>
                      <input type="text" name="names" value="{{ $products->name }}" class="form-control"   placeholder="Name Product">
                    </div>
                    <div class="form-group">
                      <label >Price Product</label>
                      <input type="text" name="price" value="{{ $products->price }}" class="form-control"   placeholder="Price Product">
                    </div>

                    <div class="form-group">
                      <label >Image Product</label>
                      <input type="file"  name="feature_img_path" class="form-control-file" >
                      <div class="col-md-12">
                          <div class="row">
                              <img class="image_detail" src="{{$products->feature_img_path}}"/>
                          </div>
                      </div>
                  </div>

                    <div class="form-group">
                      <label >Image Details Product</label>
                      <input type="file" multiple name="image_path[]" class="form-control-file" >
                      <div class="col-md-12">
                        <div class="row">
                            @foreach ($products->images as $imageItem)
                                <div class="col md-3">
                                    <img class="image_detail" src="{{$imageItem->Image_path}}" />
                                </div>
                            @endforeach
                        </div>
                      </div>
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
                            @foreach ($products->tags as $tagitem)
                            <option value="{{$tagitem->name}}" selected>{{$tagitem->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>                                      
            </div>
            <div class="div col-md-12">
                <div class="form-group">
                    <label for="Content">Content Product</label>
                    <textarea  class="form-control tinymce_editor_init" name="contents" rows="8">{{$products->content}}</textarea>
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