<?php

namespace App\Controllers\Notas;

use App\Model\Nota;

class IndexController
{
    public function __invoke()
    {
        $pesquisar = $_GET['pesquisar'] ?? null;
        $notas = Nota::all($pesquisar);
        $id = isset($_GET['id']) ? $_GET['id'] : (sizeof($notas) > 0 ? $notas[0]->id : null);
        $notaFiltrada = array_filter($notas, fn($n) => $n->id == $id);
        $notaSelecionada = array_pop($notaFiltrada);

        if(!$notaSelecionada) {
            return view('notas/nao-encontrada');
        }

        return view('notas', ['notas' => $notas, 'notaSelecionada' => $notaSelecionada]);
    }
}