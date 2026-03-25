<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

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

    /*======================relationship===========*/
    /*=============================================*/
    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*===================globalscope================*/
    /*==============================================*/

    protected static function booted()
    {
        static::addGlobalScope('userdetail',function(Builder $builder){

            $builder->with('user:id,name');

        });
    }

    /*=====================local scope=============*/
    /*=============================================*/
    public function scopeActive($query)
    {
        return $query->where('status',1);
    }
    public function scopeInActive($query)
    {
        return $query->where('status',0);
    }

    
}
