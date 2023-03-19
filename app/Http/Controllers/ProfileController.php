<?php

namespace App\Http\Controllers;

use App\Company;
use App\Form;
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

    public function CompanyProfile(Company $company)
    {
        $FormCount = Form::whereHas('job', function($q) use ($company) {
            $q->where('company_id', $company->id);
        })->count();

        return view('company-profile', compact('company', 'FormCount'));
    }

}
