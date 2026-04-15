<?php
namespace Core;

use App\Model\Usuario;
use Core\Database;

class Validacao
{
    public $validacoes = [];



    public static function validar($regras, $dados)
    {
        $validacao = new self;

        foreach ($regras as $campo => $regrasDoCampo) {
            foreach ($regrasDoCampo as $regra) {
                $valorCampo = $dados[$campo];
                if ($regra == 'confirmed') {
                    $validacao->$regra($campo, $valorCampo, $dados["{$campo}_confirmacao"]);
                } elseif (str_contains($regra, ':')) {
                    $temp = explode(':', $regra);
                    $regra = $temp[0];
                    $regraArg = $temp[1];
                    $validacao->$regra($regraArg, $campo, $valorCampo);
                } else {
                    $validacao->$regra($campo, $valorCampo);
                }
            }
        }

        return $validacao;
    }

    private function required($campo, $valorCampo)
    {
        if (strlen($valorCampo) == 0) {
            $this->addError($campo, "O $campo é obrigatório");
        }
    }

    private function email($campo, $valorCampo)
    {
        if (! filter_var($valorCampo, FILTER_VALIDATE_EMAIL)) {
            $this->addError($campo, "O $campo é inválido.");
        }
    }

    private function confirmed($campo, $valorCampo, $campoDeConfirmacao)
    {
        if ($valorCampo != $campoDeConfirmacao) {
            $this->addError($campo, 'Os e-mails precisam ser iguais.');
        }
    }

    private function min($min, $campo, $valorCampo)
    {
        if (strlen($valorCampo) < $min) {
            $this->addError($campo, "O $campo precia ser maior que $min caracteres");
        }
    }

    private function max($max, $campo, $valorCampo)
    {
        if (strlen($valorCampo) > $max) {
            $this->addError($campo, "O $campo precia ser menor que $max caracteres");
        }
    }

    private function unique($tabela, $campo, $dados)
    {
        if(strlen($dados) == 0){
            return;
        }

        $database = new Database(config('database'));

        dd($database);

        $usuario = $database->query(
            query: "select * from $tabela where $campo = :email",
            class: Usuario::class,
            params: [$campo => $dados])
        ->fetch();

        if(isset($usuario->email)) {
            $this->validacoes []= 'O e-mail informado já existe.';
        }
    }

    public function naoPassou($campoCustomizado = null)
    {
        $chave = 'validacoes';

        if ($campoCustomizado) {
            $chave .= '_' . $campoCustomizado;
        }

        flash()->push($chave, $this->validacoes);
        return sizeof($this->validacoes) > 0;
    }

    private function addError($campo, $erro){
        $this->validacoes[$campo][] = $erro;
    }
}
