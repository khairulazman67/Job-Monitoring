<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    // use HasFactory;
    public $table="sectors";
    protected $fillable=[
        'id',
        'nama',
        'created_at',
        'updated_at',
    ];
    public function Orders(){
        return $this->hasMany('App\Models\Order', 'id_sector');
    }
    public function Crews(){
        return $this->hasOne('App\Models\Crew', 'id_sector');
    }
    public function Sto(){
        return $this->hasOne('App\Models\Sto', 'id_sector');
    }
}
