<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreJobByCompanyRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Job;
use App\Location;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    use MediaUploadingTrait;

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
        $jobs = Job::orderBy('top_rated', 'DESC')
            ->orderBy('id', 'DESC')
            ->with('company.jobs.company.created_by')
            ->paginate(7);

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
