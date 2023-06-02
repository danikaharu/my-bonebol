<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agency\{StoreAgencyRequest, UpdateAgencyRequest};
use App\Models\Agency;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $agency = Agency::orderBy('id', 'DESC')->get();
            return datatables()->of($agency)
                ->addIndexColumn()
                ->addColumn('action', 'admin.agency.include.action')
                ->toJson();
        }

        return view('admin.agency.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgencyRequest $request)
    {
        try {
            $attr = $request->validated();

            Agency::create($attr);

            return redirect()->route('admin.agency.index')
                ->with('toast_success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.agency.index')
                ->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        return view('admin.agency.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgencyRequest $request, Agency $agency)
    {
        try {

            $attr = $request->validated();

            $agency->update($attr);

            return redirect()->route('admin.agency.index')
                ->with('toast_success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect()->route('admin.agency.index')
                ->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        try {
            $agency->delete();

            return redirect()->route('admin.agency.index')
                ->with('toast_success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.agency.index')
                ->with('toast_error', $th->getMessage());
        }
    }
}
