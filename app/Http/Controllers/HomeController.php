<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    private $category;
    public function __construct( Slider $slider, Category $category)
    {
        $this->slider  = $slider;
        $this->category = $category;
    }
    public function index(){
        $sliders = $this->slider->latest()->get();
        $catregory = Category ::where('parent_id', 0)->get();
        $products = Product::latest()->take(6)->get();
        return view('home.home',compact('sliders' , 'catregory','products'));
    }
}
