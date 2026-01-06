<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory  , SoftDeletes;

    protected $fillable = ['user_id','title','content','slug','status'];
    protected $dates = ['deleted_at'];
    protected $casts = [

        'status' => 'boolean',
        'created_at' => 'datetime:Y-m-d',
    ];

    /*================mutator===================*/
    /*==========================================*/

    /*
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->slug = \Str::slug($value); 
    }
    /*===============Acceessor==================*/
    /*==========================================*/

    /*
    public function getTitleAttribute($value)
    {
        return \Str::upper($value);
    }*/

    /*================latst version============*/
    /*=========================================*/
    public function title() : Attribute
    {
        return Attribute::make(

            get : fn($value) => \Str::upper($value),

            set : fn($value) => [

                'title' => $value,
                'slug' => \Str::slug($value)
            ]
            
        );
    }
}
