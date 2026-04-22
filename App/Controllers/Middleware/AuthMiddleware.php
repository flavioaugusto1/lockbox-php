<?php

namespace App\Controllers\Middleware;

class AuthMiddleware
{
    public function handle(){
        if(!auth()){
            return redirect('/login');
        }
    }
}