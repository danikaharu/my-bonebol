<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\{StoreApplicationRequest, UpdateApplicationRequest};
use App\Models\{Agency, Application, Category};
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $application = Application::latest()->get();
            return datatables()->of($application)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return $row->status();
                })
                ->addColumn('agency', function ($row) {
                    return $row->agency ? $row->agency->name : '-';
                })
                ->addColumn('action', 'admin.application.include.action')
                ->toJson();
        }

        return view('admin.application.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agencies = Agency::get();
        $categories = Category::get();

        return view('admin.application.create', compact('agencies', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        try {
            $attr = $request->validated();

            Application::create($attr);

            return redirect()->route('admin.application.index')
                ->with('toast_success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.application.index')
                ->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $application->load('agency', 'category');
        return view('admin.application.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        $agencies = Agency::get();
        $categories = Category::get();

        return view('admin.application.edit', compact('application', 'agencies', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        try {

            $attr = $request->validated();

            $application->update($attr);

            return redirect()->route('admin.application.index')
                ->with('toast_success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect()->route('admin.application.index')
                ->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        try {
            $application->delete();

            return redirect()->route('admin.application.index')
                ->with('toast_success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.application.index')
                ->with('toast_error', $th->getMessage());
        }
    }

    public function export_pdf()
    {
        $applications = Application::with('agency')->orderBy('agency_id')->get();
        $activeApplications = Application::where('status', 1)->count();
        $notActiveApplications = Application::where('status', 2)->count();

        $pdf = Pdf::loadView('admin.application.export-pdf', compact('applications', 'activeApplications', 'notActiveApplications'))->setPaper('A4', 'portrait');
        return $pdf->stream('laporan-aplikasi.pdf');
    }
}
