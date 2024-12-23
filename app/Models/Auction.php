<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function product(){
        return $this->belongsToMany(Product::class);
    }
    public function result(){
        return $this->hasMany(Result::class);
    }
}
