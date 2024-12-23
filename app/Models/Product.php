<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function bid(){
        return $this->hasMany(Bid::class);
    }
    public function user(){
        return $this->belongsToMany(User::class)->withPivot('action_type');
    }
    public function owner(){
        return $this->user()->wherePivot('action_type', 'own');
    }
}
