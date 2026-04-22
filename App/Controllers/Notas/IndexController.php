<?php

namespace App\Controllers\Notas;

use App\Model\Nota;

class IndexController
{
    public function __invoke()
    {
        $notas = Nota::all();
        $id = isset($_GET['id']) ? $_GET['id'] : $notas[0]->id;
        $notaFiltrada = array_filter($notas, fn($n) => $n->id == $id);
        $notaSelecionada = array_pop($notaFiltrada);

        return view('notas', ['notas' => $notas, 'notaSelecionada' => $notaSelecionada]);
    }
}