<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WarrantyStoreRequest;
use App\Http\Requests\Admin\WarrantyUpdateRequest;
use App\Models\Warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $warrantys = Warranty::paginate(10);

        return view('admin.warrantys.index', compact('warrantys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $resquest)
    {
        $warranty = new Warranty();

        return view('admin.warrantys.create', compact('warranty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarrantyStoreRequest $request)
    {
        $warranty = new Warranty($request->validated());

        $warranty->save();

        return redirect()
            ->route('admin.warrantys.index')
            ->with(['alert-success' => __('messages.created_success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Warranty $warranty)
    {
        return view('admin.warrantys.show', compact('warranty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Warranty $warranty)
    {
        return view('admin.warrantys.edit', compact('warranty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function update(WarrantyUpdateRequest $request, Warranty $warranty)
    {
        $warranty->update($request->validated());

        return redirect()
            ->route('admin.warrantys.index')
            ->with(['alert-success' => __('messages.updated_success')]);
    }
}
