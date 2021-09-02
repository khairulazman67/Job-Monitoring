<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory;
    public $table="orders";
    protected $fillable=[
        'id',
        'no_Tiket',
        'id_sector',
        'id_crew',
        'id_STO',
        'ND',
        'nm_pelanggan',
        'id_tipeTiket',
        'DATEK',
        'status',
        'close_date',
        'created_at',
        'updated_at',
    ];
    public function Sectors(){
        return $this->belongsTo('App\Models\Sector','id_sector','id');
    }
    public function Crews(){
        return $this->belongsTo('App\Models\Crew','id_crew','id');
    }
    public function Types(){
        return $this->belongsTo('App\Models\Type','id_tipeTiket','id');
    }
    public function Sto(){
        return $this->belongsTo('App\Models\Sto','id_STO','id');
    }
}
