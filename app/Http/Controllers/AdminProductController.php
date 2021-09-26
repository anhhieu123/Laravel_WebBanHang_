<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageDeleteModelTrail;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    use StorageDeleteModelTrail;
    private $category;
    private $product;
    private $tag;
    private $productTag;


    public function __construct(Category $category, Product $product, Tag $tag, ProductTag $productTag)
    {
      $this ->category = $category;
      $this ->product = $product;
      $this ->tag = $tag;
      $this ->proproductTag = $productTag;


    }
    public function index(){
      $products = $this->product->latest() ->paginate(5);
      return view('admin.product.index',compact('products'));
    }
    public function create(){
      $htmlOption=$this->getCategory($parentId='');
      return view('admin.product.add',compact('htmlOption'));
    }
    public function getCategory($parentId){
      $data = $this->category->all();
      $recusive = new Recusive($data);
      $htmlOption=$recusive->categoryRecusive($parentId);

      return $htmlOption;
    }
    public function store(Request $request){
      try{
        DB::beginTransaction();
        $dataProductCreate=[
          'name'=>$request->names,
          'price'=>$request->price,
          'content'=>$request->contents,
          'user_id'=>1,
          'category_id'=>$request->category_id,
    
        ];
        $dataUploadFeatureImage=$this->storageTraitUpload($request,'feature_img_path','product' );
    
        if(!empty($dataUploadFeatureImage)){
          $dataProductCreate['feature_image_name']=$dataUploadFeatureImage['file_name'];
          $dataProductCreate['feature_img_path']=$dataUploadFeatureImage['file_path'];
    
        }
    
        $product = $this->product->create($dataProductCreate);
    
    
        if($request->hasFile('image_path')){
          foreach($request->image_path as $fileItem){
            $dataProductDetail = $this ->storageTraitUploadMuti($fileItem, 'product');
            $product->images()->create([
              'product_id'=> $product->id,
              'image_path'=>$dataProductDetail['file_path'],
              'image_name'=>$dataProductDetail['file_name']
    
            ]);
          
          }
        }
    
        //insert tag
        if(!empty($request->tag1s)){
          foreach($request->tag1s as $tagItem){
            $tagInstance= $this -> tag -> firstOrCreate(['name' => $tagItem]);
            $tagIds[] = $tagInstance->id;
          }
        }
        
        $product->tags()->attach($tagIds);
        DB::commit();
    
        return redirect(route('product.index'));

      }catch( \Exception $excep)
      {
        DB::rollBack();
        Log::error('Mess: '. $excep->getMessage() . 'Line: '.$excep->getLine());
      }
      
    
    }

    public function edit($id, Request $request){
      $products = $this -> product -> find($id);
      $htmlOption=$this ->getCategory($products->category_id);
      return view('admin.product.edit', compact('htmlOption', 'products'));
    }
    public function delete($id){
      return $this->deleteTrait($id, $this->profucts);
    }
    public function update($id, Request $request){
      try{
        DB::beginTransaction();
        $dataProductUpdate=[
          'name'=>$request->names,
          'price'=>$request->price,
          'content'=>$request->contents,
          'user_id'=>1,
          'category_id'=>$request->category_id,
    
        ];
        $dataUploadFeatureImage=$this->storageTraitUpload($request,'feature_img_path','product' );
    
        if(!empty($dataUploadFeatureImage)){
          $dataProductUpdate['feature_image_name']=$dataUploadFeatureImage['file_name'];
          $dataProductUpdate['feature_img_path']=$dataUploadFeatureImage['file_path'];
    
        }
    
         $this->product->find($id) ->update($dataProductUpdate);
         $product = $this ->product ->find($id);
        //insert img
        if($request->hasFile('image_path')){
          $this ->images ->where('product_id', $id)->delete();
          foreach($request->image_path as $fileItem){
            $dataProductDetail = $this ->storageTraitUploadMuti($fileItem, 'product');
            $product->images()->create([
              'product_id'=> $product->id,
              'image_path'=>$dataProductDetail['file_path'],
              'image_name'=>$dataProductDetail['file_name']
    
            ]);
          
          }
        }
    
        //insert tag
        if(!empty($request->tag1s)){
          foreach($request->tag1s as $tagItem){
            $tagInstance= $this -> tag -> sync(['name' => $tagItem]);
            $tagIds[] = $tagInstance->id;
          }
        }
        
        $product->tags()->attach($tagIds);
        DB::commit();
    
        return redirect(route('product.index'));

      }catch( \Exception $excep)
      {
        DB::rollBack();
        Log::error('Mess: '. $excep->getMessage() . 'Line: '.$excep->getLine());
      }
    }
}
