<?php

namespace App\Controllers;

use App\Model\Usuario;
use Core\Database;
use Core\Validacao;

class LoginController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $validacao = Validacao::validar(
            [
                'email' => ['email', 'required'],
                'senha' => ['required', 'min:8', 'max:30']
            ],
            $_POST
        );

        if ($validacao->naoPassou()) {
            view('login');
            exit();
        }


        $database = new Database(config('database'));

        $usuario = $database->query(
            query: "select * from usuarios where email = :email",
            class: Usuario::class,
            params: compact('email')
        )->fetch();

        if (! ($usuario && password_verify($_POST['senha'], $usuario->senha))) {
            flash()->push('validacoes', ['email' => ['E-mail ou senha inválidos.']]);
            return view('login');
        }

        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', "Seja bem-vindo! $usuario->nome!");
        redirect('/dashboard');
    }
}
