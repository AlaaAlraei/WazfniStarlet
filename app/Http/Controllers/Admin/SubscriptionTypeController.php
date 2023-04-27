<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubscriptionTypeRequest;
use App\Http\Requests\StoreSubscriptionTypeRequest;
use App\Http\Requests\UpdateSubscriptionTypeRequest;
use App\SubscriptionType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscription_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription_types = SubscriptionType::all();

        return view('admin.subscription_types.index', compact('subscription_types'));
    }

    public function create()
    {
        abort_if(Gate::denies('subscription_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $features = Feature::all()->pluck('title', 'id');

        return view('admin.subscription_types.create', compact('features'));
    }

    public function store(StoreSubscriptionTypeRequest $request)
    {
        $subscription_type = SubscriptionType::create($request->all());

        return redirect()->route('admin.subscription_types.index');
    }

    public function edit(SubscriptionType $subscription_type)
    {
        abort_if(Gate::denies('subscription_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $features = Feature::all()->pluck('title', 'id');

        return view('admin.subscription_types.edit', compact('subscription_type', 'features'));
    }

    public function update(UpdateSubscriptionTypeRequest $request, SubscriptionType $subscription_type)
    {
        $subscription_type->update($request->all());

        return redirect()->route('admin.subscription_types.index');
    }

    public function show(SubscriptionType $subscription_type)
    {
        abort_if(Gate::denies('subscription_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscription_types.show', compact('subscription_type'));
    }

    public function destroy(SubscriptionType $subscription_type)
    {
        abort_if(Gate::denies('subscription_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription_type->delete();

        return back();
    }

    public function massDestroy(MassDestroySubscriptionTypeRequest $request)
    {
        SubscriptionType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
