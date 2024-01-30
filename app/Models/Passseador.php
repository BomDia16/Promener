<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Passseador extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'idade',
        'cpf',
        'celular',
        'password',
        'imagem'
    ];

    protected $table = 'passeadores';

    public function inserir($dados) {
        $cadastrar = $this->create([
            'nome'          => $dados['name'],
            'email'         => $dados['email'],
            'idade'         => $dados['idade'],
            'cpf'           => $dados['cpf'],
            'celular'       => $dados['celular'],
            'imagem'          => $dados['imagem'],
            'password'      => bcrypt($dados['password']),
        ]);

        if($cadastrar){
            return [
                'status' => true,
                'message' => 'Sucesso ao cadastrar o usuário!'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Falha ao cadastrar o usuário!',
            ];
        }
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function login($dados) {
        $credenciais = [
            'email'     => $dados['email'],
            'password' => $dados['password']
        ];
        return Auth::guard('passeador')->attempt($credenciais);
    }

    public function logout() {
        return Auth::guard('passeador')->logout();
    }
}
