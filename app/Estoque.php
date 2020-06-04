<?php

namespace App;

use App\Produto;
use App\Entrada;
use App\Saida;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    public $timestamps = true;
    protected $fillable = ['produto_id', 'entrada_id', 'saida_id'];

    public function produtos()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'entrada_id');
    }

    public function saida()
    {
        return $this->belongsTo(Saida::class, 'saida_id');
    }

}
