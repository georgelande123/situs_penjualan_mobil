<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = ['nama_pembeli', 'email_pembeli', 'no_hp', 'stocks_id', 'jumlah_mobil'];

    public function stock (){
        return $this->belongsTo('App\Models\Stock', 'stocks_id');
    }
}
