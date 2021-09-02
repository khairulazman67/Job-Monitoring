<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // use HasFactory;
    protected $table="admins";
    protected $fillable = [
        'NIK',
        'created_at',
        'updated_at',
    ]; 
    public function Users(){
        return $this->hasOne('App\Models\User','NIK');
    }

}
