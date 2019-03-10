<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug', 'url', 'address', 'email'];

    public function components()
    {
        return $this->hasMany(Component::class);
    }
}
