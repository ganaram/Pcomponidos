<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = ['name','brand_id','slug','info','type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function computers()
    {
        return $this->belongsToMany(Computer::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
