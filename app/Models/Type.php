<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // use HasFactory;
    public $table="types";
    protected $fillable=[
        'nama',
        'created_at',
        'updated_at',
    ];

    public function Orders(){
        return $this->hasMany('App\Models\Order', 'id_tipeTiket');
    }
}
