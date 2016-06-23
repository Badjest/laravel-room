<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdvancedReg extends Controller
{

    public function register(Request $request)

    {

        $this->validate($request, [

            'name' => 'required|unique:users|max:100',

            'password' => 'required|min:4'

        ]);

        $user=User::create([
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
        ]);
        if(!empty($user->id))
        {
            return Redirect::back()->with('message','Вы зарегестрированы! Пожалуйста, авторизируйтесь!');
        }
        else {
            return Redirect::back()->with('message','Беда с базой, попробуй позже');
        }
    }

}
