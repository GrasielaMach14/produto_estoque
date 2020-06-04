<?php

namespace App;

use App\Setor;
use App\Estoque;
use App\Entrada;
use App\Saida;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    public $timestamps = false;
    protected $fillable = ['setor_id', 'matricula', 'nome', 'cpf'];
    
    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }

    public function estoques()
    {
        return $this->hasMany(Estoque::class);
    }

    public function entrada()
    {
        return $this->hasMany(Entrada::class);
    }

    public function saida()
    {
        return $this->hasMany(Saida::class);
    }
}
