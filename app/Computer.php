<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Computer extends Model
{
    protected $fillable = ['user_id', 'slug','model', 'price', 'description','img'];

    public function components()
    {
        return $this->belongsToMany(Component::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getImgAttribute($img)
    {
        if( !$img || starts_with($img, 'http') ){
            return $img;
        }
        return Storage::disk('public')->url($img);
    }
}
