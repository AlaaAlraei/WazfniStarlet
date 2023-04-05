<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Category;
use App\Company;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreJobByCompanyRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Job;
use App\Location;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    use MediaUploadingTrait;

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
        $jobPromotes = Job::with('company')
            ->where('promoted', 1)
            ->orderBy('id', 'desc')
            ->take(20)
            ->get();
        $jobOutOfJordans = Job::with('company')
            ->whereHas('location', function($q){
                $q->where('country_id', '>', '1');
            })
            ->orderBy('top_rated', 'desc')
            ->take(7)
            ->get();

        $advertisings = Advertising::all();

        return view('jobs.index', compact('searchLocations', 'searchCategories', 'searchByCategory', 'jobs', 'advertisings', 'jobTops', 'jobPromotes', 'jobOutOfJordans'));

    }

    public function GetAllJobs(Request $request)
    {
        if ($request['Outside'] == 'Jordan')
        {
            $jobs = Job::orderBy('top_rated', 'DESC')
                ->orderBy('id', 'DESC')
                ->with('company.jobs.company.created_by')
                ->paginate(7);
        }
        else
        {
            $jobs = Job::orderBy('top_rated', 'DESC')
                ->orderBy('id', 'DESC')
                ->with('company.jobs.company.created_by')
                ->whereHas('location', function($q){
                    $q->where('country_id', '>', '1');
                })
                ->paginate(7);
        }

        return response()->json(array(
            'success' => true,
            'message' => 'done',
            'jobs'   => $jobs,
        ));
    }

    public function GetByCategoriesJobs(Category $category)
    {
        $jobs = Job::with('company.jobs.company.created_by')
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

    public function create()
    {
        $types      = Type::all()->pluck('title', 'id');

        $companies  = Company::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations  = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all();

        return view('jobs.create', compact('companies', 'categories', 'locations', 'types'));
    }

    public function store(StoreJobByCompanyRequest $request)
    {
        $job = Job::create($request->all());
        $job->categories()->sync($request->input('categories', []));

        if ($request->input('photo', false)) {
            $job->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        $companies = Company::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id');

        return view('jobs.edit', compact('companies', 'locations', 'categories', 'job'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->all());
        $job->categories()->sync($request->input('categories', []));

        if ($request->input('photo', false)) {
            if (!$job->photo || $request->input('photo') !== $job->photo->file_name) {
                $job->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($job->photo) {
            $job->photo->delete();
        }

        return view('jobs.show', compact('job'));
    }

    public function show(Job $job)
    {
        $job->load('company');

        $similar = Job::whereHas('categories', function($q) use ($job) {
            $q->whereHas('jobs', function($q) use ($job) {
                $q->where('id', $job->id);
            });
        })
            ->orderBy('top_rated', 'desc')
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();

        return view('jobs.show', compact('job', 'similar'));
    }
}
