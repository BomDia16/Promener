<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'celular',
        'password',
    ];

    protected $table = 'users';

    public function inserir($dados) {
        $cadastrar = $this->create([
            'nome'          => $dados['name'],
            'email'         => $dados['email'],
            'cpf'           => $dados['cpf'],
            'celular'       => $dados['celular'],
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

    public function login($dados) {
        $credenciais = [
            'email' => $dados['email'],
            'password' => $dados['password']
        ];
        return Auth::attempt($credenciais);
    }

    public function logout() {
        return Auth::logout();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
