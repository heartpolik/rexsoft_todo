<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'priority'
    ];

    public function myCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
