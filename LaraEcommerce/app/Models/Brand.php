<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{



     public $fillable = [
                   'name',
             'description',
             'image',
             
             

    ];
    public function parent()
     {
     	

          return $this->belongsTo(Category::class,'parent_id');

     }


      public function products()
     {
     	

          return $this->hasMany(Category::class);

     }
}
