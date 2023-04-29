<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Subscription;
use App\SubscriptionType;
use Illuminate\Http\Request;

class PromoteController extends Controller
{
    public function index()
    {
        $subscription_types = SubscriptionType::where('kind', 0)->get();
        $features           = Feature::all();

        return view('promote', compact('subscription_types', 'features'));
    }
}
