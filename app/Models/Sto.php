<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sto extends Model
{
    // use HasFactory;
    public $table="stos";
    protected $fillable=[
        'id_sector',
        'nama',
        'created_at',
        'updated_at',
    ];
    public function Sectors(){
        return $this->belongsTo('App\Models\Sector','id_sector','id');
    }
    public function Orders(){
        return $this->hasMany('App\Models\Order','id_STO');
    }

}
