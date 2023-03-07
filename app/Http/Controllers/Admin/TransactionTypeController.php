<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionTypeRequest;
use App\Http\Requests\StoreTransactionTypeRequest;
use App\Http\Requests\UpdateTransactionTypeRequest;
use App\TransactionType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transaction_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction_types = TransactionType::all();

        return view('admin.transaction_types.index', compact('transaction_types'));
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transaction_types.create');
    }

    public function store(StoreTransactionTypeRequest $request)
    {
        $transaction_type = TransactionType::create($request->all());

        return redirect()->route('admin.transaction_types.index');
    }

    public function edit(TransactionType $transaction_type)
    {
        abort_if(Gate::denies('transaction_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transaction_types.edit', compact('transaction_type'));
    }

    public function update(UpdateTransactionTypeRequest $request, TransactionType $transaction_type)
    {
        $transaction_type->update($request->all());

        return redirect()->route('admin.transaction_types.index');
    }

    public function show(TransactionType $transaction_type)
    {
        abort_if(Gate::denies('transaction_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transaction_types.show', compact('transaction_type'));
    }

    public function destroy(TransactionType $transaction_type)
    {
        abort_if(Gate::denies('transaction_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction_type->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionTypeRequest $request)
    {
        TransactionType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
