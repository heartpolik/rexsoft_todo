<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function myCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
