<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cachorro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'raca',
        'peso',
        'informacao_extra',
        'imagem',
        'user_id',
    ];

    protected $table = 'cachorros';

    public function inserir($dados) {
        $cadastrar = $this->create([
            'nome'              => $dados['nome'],
            'raca'              => $dados['raca'],
            'peso'              => $dados['peso'],
            'informacao_extra'  => $dados['informacao_extra'],
            'imagem'            => $dados['imagem'],
            'user_id'           => auth()->user()->id,
        ]);

        if($cadastrar){
            return [
                'status' => true,
                'message' => 'Sucesso ao cadastrar o cachorro!'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Falha ao cadastrar o cachorro!',
            ];
        }
    }
}