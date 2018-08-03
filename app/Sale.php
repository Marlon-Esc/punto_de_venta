<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	protected $fillable=['user_id','client_id','subtotal','IVA','total'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function client()
    {
    	return $this->belongsTo(Client::class);
    }
    public function detail()
    {
    	return $this->hasMany(SaleDetail::class);
    }
    
}
