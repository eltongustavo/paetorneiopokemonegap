<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adm extends Model
{
    use HasFactory;

    // protected $primaryKey = 'administrador';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public function equipe(){
        return $this->hasMany(Equipe::class);
    }
}
