<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            // Se o usuário estiver logado, redireciona para a página inicial (home)
            return redirect()->route('home');
        }

        // Login Automático (admin/admin)
        if (Auth::attempt(['email' => 'admin@gmail.com', 'password' => 'admin'])) {
            // Se o login for bem-sucedido, redirecione para a página de dashboard
            return redirect()->route('produtos');
        } else {
            // Se as credenciais estiverem erradas, redirecione para alguma outra página ou exiba uma mensagem de erro
            echo ("LOGIN INVALIDO");
        }
    }
}
