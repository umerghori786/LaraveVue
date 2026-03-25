<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    protected $fillable = ['title','content','url','slug'];

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable')->withTimestamps();
    }

    
}
