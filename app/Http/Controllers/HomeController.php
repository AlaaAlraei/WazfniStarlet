<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Category;
use App\Location;
use App\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $searchLocations  = Location::pluck('name', 'id');
        $searchCategories = Category::all();
        $searchByCategory = Category::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(5)
            ->pluck('name', 'id');
        $jobs = Job::with('company')
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();
        $jobTops = Job::with('company')
            ->where('top_rated', 1)
            ->orderBy('id', 'desc')
            ->take(20)
            ->get();

        $advertisings = Advertising::all();

        return view('index', compact(['searchLocations', 'searchCategories', 'searchByCategory', 'jobs', 'advertisings', 'jobTops']));
    }

    public function search(Request $request)
    {
        $jobs = Job::with('company')
            ->searchResults()
            ->paginate(7);

        $banner = 'Search results';

        return view('jobs.index', compact(['jobs', 'banner']));
    }

    public function profile()
    {
        return view('profile');
    }

}
