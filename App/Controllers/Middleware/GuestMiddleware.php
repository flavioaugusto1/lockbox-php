<?php

namespace App\Controllers\Middleware;

class GuestMiddleware
{
    public function handle()
    {
        if (auth()) {
            return redirect('/notas');
        }
    }
}
