<?php

namespace App\Controllers;

class IndexController
{
    public function __invoke()
    {
        view('index', template: 'guest');
    }
}