<?php

namespace App;

use App\Categoria;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false;
    protected $fillable = ['categoria_id', 'nome', 'modelo', 'descricao', 'preco', 'valor_final', 'quantidade'];
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function getPriceAttribute($preco)
    {
        return $this->attributes['preco'] = sprintf('R$ %s', number_format($preco, 2, ',', '.'));
    }

    
   
}
