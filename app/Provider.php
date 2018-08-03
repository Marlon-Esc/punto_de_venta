<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function product()
    {
    	return $this->hasMany(Product::class);
    }
}
