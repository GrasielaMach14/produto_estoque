<?php

namespace App;

use App\Produto;
use App\Funcionario;
use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    public $timestamps = true;
    protected $fillable = ['produto_id', 'valor', 'funcionario_id', 'quantidade', 'data_saida'];

    public function produtos()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function funcionarios()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }
}
