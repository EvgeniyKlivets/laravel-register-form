<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //повернення сторінки з формою реєстрації
    
    public function create()
    {
        //dd(session()->all());
        //dd(session('errors')); //виводить помилки
        return view('login');
        //return view('auth.register');
    }

    //створення нового користувача
    public function store(Request $request)//import down
    {
        //validate
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',//унікальні емайли з табл. юзерс
           'password'=>'required|confirmed|min:8'//перевірка пароля з мінімальною кіл.сиволів 8

            //масіви
           // 'name'=>['required', 'string'],
            //'email'=>['required','string', 'email','unique:users'],//унікальні емайли з табл. юзерс
           // 'password'=>['required','confirmed','min:8']//перевірка пароля з мінімальною кіл.сиволів 8
        ]);

       
    }
}
