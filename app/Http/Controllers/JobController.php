<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use App\Location;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')
            ->paginate(7);
        $searchCategories = Category::take(12)->get();

        $banner = 'Jobs';

        return view('jobs.index', compact(['jobs', 'banner', 'searchCategories']));
    }

    public function GetAllJobs()
    {
        $jobs = Job::with('company')
            ->paginate(7);

        return response()->json(array(
            'success' => true,
            'message' => 'done',
            'jobs'   => $jobs,
        ));
    }

    public function GetByCategoriesJobs(Category $category)
    {
        $jobs = Job::with('company')
            ->whereHas('categories', function($query) use($category) {
                $query->whereId($category->id);
            })
            ->paginate(7);

        return response()->json(array(
            'success' => true,
            'message' => 'done',
            'jobs'    => $jobs,
        ));
    }

    public function show(Job $job)
    {
        $job->load('company');

        return view('jobs.show', compact('job'));
    }
}
