<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'nome';
    public $incrementing = false;
    protected $keyType = 'string';

    public function setSenhaAttribute($senha) {
        $this->attributes['senha'] = Hash::make($senha);
    }

    public function equipe(){
        return $this->hasOne(Equipe::class);
    }
}
