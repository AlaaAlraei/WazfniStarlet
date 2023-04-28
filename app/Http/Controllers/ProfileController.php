<?php

namespace App\Http\Controllers;

use App\Company;
use App\Form;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateGeneralEmployeeProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function MyProfile()
    {
        return view('my-profile');
    }

    public function profile(User $user)
    {
        return view('profile', compact('user'));
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

    public function BusinessProfile()
    {
        return view('BusinessProfile');
    }

    public function UpdateGeneralEmployeeProfile(UpdateGeneralEmployeeProfileRequest $request)
    {

        $request->only('name','last_name','email', 'phone', 'imagePC', 'category_id', 'country_id');

        if ($request->file('imagePC')){
            $image=$request->file('imagePC');
            $extensionimageDoc = $image->getClientOriginalExtension();
            $PathToimageDoc    = $image->storeAs('public/employee_profile',uniqid(6).time() . "." . $extensionimageDoc);
            $request['image']  = $PathToimageDoc;
        }

        $user = Auth::user();

        $user->update([
            'name'       => $request['name'],
            'last_name'  => $request['last_name'],
            'phone'      => $request['phone'],
            'image'      => $request['image'],
        ]);

        $user->employee->update([
            'category_id' => $request['category_id'],
            'country_id'  => $request['country_id'],
        ]);

        return redirect()->back()->with('message', 'done');
    }

    public function PersonalAccount()
    {
        return view('PersonalAccount');
    }

    public function BusinessAccount()
    {
        return view('BusinessAccount');
    }

}
