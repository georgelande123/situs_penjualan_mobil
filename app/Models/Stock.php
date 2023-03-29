<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['nama_mobil', 'harga_mobil', 'stock_mobil'];

    public function buyer () {
        return $this->hasMany('App\Models\Buyer');
    }
}
