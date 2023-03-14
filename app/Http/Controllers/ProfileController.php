<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function MyProfile()
    {
        return view('my-profile');
    }

    public function Register(RegisterRequest $request)
    {
        if (Auth::user())
        {
            return redirect()->route('home');
        }

        $user = User::create($request->all());
        $user->roles()->sync($request->input('role'));

        Auth::login($user);

        return redirect()->route('home');

    }

    public function CompanyProfile()
    {
        return view('company-profile');
    }

}
