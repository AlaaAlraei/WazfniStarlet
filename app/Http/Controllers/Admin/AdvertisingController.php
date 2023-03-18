<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAdvertisingRequest;
use App\Http\Requests\StoreAdvertisingRequest;
use App\Http\Requests\UpdateAdvertisingRequest;
use App\Advertising;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvertisingController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('advertising_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertisings = Advertising::all();

        return view('admin.advertisings.index', compact('advertisings'));
    }

    public function create()
    {
        abort_if(Gate::denies('advertising_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advertisings.create');
    }

    public function store(StoreAdvertisingRequest $request)
    {
        $advertising = Advertising::create($request->all());

        if ($request->input('photo', false)) {
            $advertising->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.advertisings.index');
    }

    public function edit(Advertising $advertising)
    {
        abort_if(Gate::denies('advertising_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advertisings.edit', compact('advertising'));
    }

    public function update(UpdateAdvertisingRequest $request, Advertising $advertising)
    {
        $advertising->update($request->all());

        if ($request->input('photo', false)) {
            if (!$advertising->photo || $request->input('photo') !== $advertising->photo->file_name) {
                $advertising->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($advertising->photo) {
            $advertising->photo->delete();
        }

        return redirect()->route('admin.advertisings.index');
    }

    public function show(Advertising $advertising)
    {
        abort_if(Gate::denies('advertising_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advertisings.show', compact('advertising'));
    }

    public function destroy(Advertising $advertising)
    {
        abort_if(Gate::denies('advertising_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertising->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdvertisingRequest $request)
    {
        Advertising::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
