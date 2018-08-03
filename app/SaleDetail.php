<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SaleDetail extends Model
{
	protected $table = 'saledetails';
	protected $fillable=['sales_id','product_id','cantidad','Total'];
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
     public function sales()
    {
    	return $this->belongsTo(Sale::class);
    }
    
}
