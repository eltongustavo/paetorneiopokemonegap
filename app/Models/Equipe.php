<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $primaryKey = 'nome_usuario';
    public $incrementing = false;
    protected $keyType = 'string';

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function adm(){
        return $this->belongsTo(Adm::class);
    }
}
