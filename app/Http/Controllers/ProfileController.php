<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function MyProfile()
    {
        return view('my-profile');
    }

    public function CompanyProfile()
    {
        return view('company-profile');
    }

}
