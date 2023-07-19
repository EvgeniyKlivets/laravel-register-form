<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class RegisterController extends Controller
{
    //повернення сторінки з формою реєстрації
    
    public function create()
    {
        //dd(session('errors')); //виводить помилки
        return view('register');
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
           // 'password'=>['required','confirmed', 'min:8']//перевірка пароля з мінімальною кіл.сиволів 8
        ]);

        //dd(($request->all())); controller
        //create user
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password) // функція хешированія
        ]);

        Auth::login($user);//ipmort down

        //повертаємо відповідь браузеру
        //return redirect('/dashboard');
        return redirect(RouteServiceProvider::HOME); // якщо є в фалі RouteServiceProvedr const (public const HOME = '/dashboard';)
    }
}
