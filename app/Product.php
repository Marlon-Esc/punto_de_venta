<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $fillable=['descripcion','cantidad','precio_prov','precio_vent','status','categories_id','providers_id'];

   	public function vent_details()
   	{
   		return $this->hasMany(SaleDetail::class);
   	}

   	public function category()
   	{
   		return $this->belongsTo(Category::class);
   	}

   	public function providers()
   	{
   		return $this->belongsTo(Provider::class);
   	}
      
}
