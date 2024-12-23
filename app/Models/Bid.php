<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';
    protected $guarded = ['id'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function auction(){
        return $this->belongsTo(Auction::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
