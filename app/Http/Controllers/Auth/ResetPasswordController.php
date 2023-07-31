<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Providers\RouteServiceProvider;
//use Illuminate\Support\Facades\Auth;
//use Dotenv\Exception\ValidationException;



class ResetPasswordController extends Controller
{
    //повернення сторінки з формою реєстрації
    
    public function create()
    {
        //dd(session()->all());
        //dd(session('errors')); //виводить помилки
        return view('reset-password');
        //return view('auth.register');
    }

    //створення нового користувача
    public function store(Request $request)//import down
    {
        //validate-якщо невірно введено 
       
    }
      
}