<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        
        $this->category = $category;
    }

    public function create()
    {
        
        $htmlOption=$this->getCategory($parentId='');

        return view('admin.category.add',compact('htmlOption'));
        
    }
    public function index(){
        $category = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('category'));
    }

    public function store(Request $requet){
        $this->category->create([
            'name'=>$requet->name,
            'parent_id'=>$requet->parent_id,
            'slug'=> Str::slug($requet->name)

        ]);

        return redirect()->route('categories.index');
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption=$recusive->categoryRecusive($parentId);

        return $htmlOption;
    }

    public function edit($id){
        $category=$this->category->find($id);
        $htmlOption=$this->getCategory($category->parent_id);
       

        return view('admin.category.edit',compact('category','htmlOption'));

    }
    public function update($id, Request $requet){
        $this->category->find($id)->update([
            'name'=>$requet->name,
            'parent_id' => $requet -> parent_id,
            'slug'=> Str::slug($requet->name)
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
    
}
