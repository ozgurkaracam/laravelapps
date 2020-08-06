<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable=['name','description','image','slug'];
    public function subcategories(){
        return $this->hasMany('App\Subcategory','category_id');
    }

}
