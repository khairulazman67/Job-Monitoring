<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    // use HasFactory;
    public $table="labors";
    protected $primaryKey="NIK";
    protected $fillable=[
        'NIK',
        'id_crew',
        'nama',
        'created_at',
        'updated_at',
    ];
    
    public function Crews(){
        return $this->belongsTo('App\Models\Crew','id_crew','id');
    }
    public function Users(){
        return $this->hasOne('App\Models\User','NIK');
    }
}
