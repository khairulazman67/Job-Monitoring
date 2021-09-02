<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    // use HasFactory
    public $table = "crews";
    protected $fillable = [
        'nama',
        'id_sector',
        'created_at',
        'updated_at',
    ]; 
    public function Orders(){
        return $this->hasMany('App\Models\Order','id_crew');
    }
    public function Labors(){
        return $this->hasMany('App\Models\Labor','id_crew');
    }
    public function Sectors(){
        return $this->belongsTo('App\Models\Sector','id_sector','id');
    }
}
