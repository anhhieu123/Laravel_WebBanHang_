<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'parnet_id', 'slug'];

    public function category_chill(){
       return $this->hasMany(Category::class , 'parent_id');
    }
}
