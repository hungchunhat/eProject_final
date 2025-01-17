<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    protected $guarded = ['id'];
    public function auction(){
        return $this->belongsTo(Auction::class);
    }
}
