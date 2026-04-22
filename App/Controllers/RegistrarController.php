<?php

namespace App\Controllers;

use Core\Database;
use Core\Validacao;

class RegistrarController
{
    public function index()
    {
        return view('registrar', template: 'guest');
    }

    public function registrar()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $email_confirmacao = $_POST['email_confirmacao'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    
        $validacao = Validacao::validar(
            [
                'nome' => ['required'],
                'email' => ['email', 'required', 'confirmed', 'unique:usuarios'],
                'senha' => ['required', 'min:8', 'max:30']
            ],
            $_POST
        );
    
        if($validacao->naoPassou()) {
            return view('registrar', template: 'guest');
        }

        $database = new Database(config('database'));

        
        $database->query(
            query: 'insert into usuarios (nome, email, senha) values (:nome, :email, :senha)',
            params: [
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha,
            ]
        );

        flash()->push('mensagem', 'Registrado com sucesso');
        return redirect('/login');
    }
}