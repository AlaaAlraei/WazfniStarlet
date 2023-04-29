<?php

namespace App\Http\Controllers;

use App\Company;
use App\Form;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateBioEmployeeProfileRequest;
use App\Http\Requests\UpdateGeneralEmployeeProfileRequest;
use App\Http\Requests\UpdateResumeEmployeeProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use MediaUploadingTrait;

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

        $user = Auth::user();

        $user->update([
            'name'       => $request['name'],
            'last_name'  => $request['last_name'],
            'phone'      => $request['phone'],
        ]);

        $user->employee->update([
            'category_id' => $request['category_id'],
            'country_id'  => $request['country_id'],
        ]);

        return redirect()->back()->with('message', 'done');
    }

    public function ChangeProfilePicture(Request $request)
    {
        $user = Auth::user();

        if ($request->input('picture', false)) {
            if (!$user->picture || $request->input('picture') !== $user->picture->file_name) {
                $user->addMedia(storage_path('tmp/uploads/' . $request->input('picture')))->toMediaCollection('picture');
            }
        } elseif ($user->picture) {
            $user->picture->delete();
        }

        return redirect()->back()->with('message', 'done');

    }

    public function UpdateBioEmployeeProfile(UpdateBioEmployeeProfileRequest $request)
    {
        $user = Auth::user();

        $user->employee->update([
            'bio' => $request['bio'],
        ]);

        return redirect()->back()->with('message', 'done');

    }

    public function UpdateResumeEmployeeProfile(UpdateResumeEmployeeProfileRequest $request)
    {
        $user = Auth::user();

        if ($request->file('resumePC')){
            $resume=$request->file('resumePC');
            $extensionresumeDoc = $resume->getClientOriginalExtension();
            $PathToresumeDoc    = $resume->storeAs('public/employee_profile',uniqid(6).time() . "." . $extensionresumeDoc);
            $request['resume']  = $PathToresumeDoc;
        }

        $user->employee->update([
            'resume' => $request['resume'],
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
