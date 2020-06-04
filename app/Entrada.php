<?php

namespace App;

use App\Produto;
use App\Fornecedor;
use App\Funcionario;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    public $timestamps = true;
    protected $fillable = ['produto_id', 'fornecedor_id', 'funcionario_id', 'quantidade', 'data_entrada'];

    public function produtos()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function fornecedores()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }

    public function funcionarios()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }
}
