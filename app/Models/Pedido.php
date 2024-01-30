<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cachorro_id',
        'passeador_id',
        'horario',
        'local',
        'preco',
        'status'
    ];

    protected $table = 'pedidos';

    public function inserir($dados) {
        $cadastrar = $this->create([
            'user_id'       => auth()->user()->id,
            'cachorro_id'   => $dados['cachorro_id'],
            'passeador_id'  => $dados['passeador_id'],
            'horario'       => $dados['horario'],
            'local'         => $dados['local'],
            'preco'         => 'R$40,00',
            'status'        => 'pendente',
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
