<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\{StoreCategoryRequest, UpdateCategoryRequest};
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $category = Category::latest()->get();
            return datatables()->of($category)
                ->addIndexColumn()
                ->addColumn('action', 'admin.category.include.action')
                ->toJson();
        }

        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $attr = $request->validated();

            if ($request->file('icon') && $request->file('icon')->isValid()) {

                $filename = $request->file('icon')->hashName();
                $request->file('icon')->storeAs('upload/kategori', $filename, 'public');

                $attr['icon'] = $filename;
            }

            Category::create($attr);

            return redirect()->route('admin.category.index')
                ->with('toast_success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.category.index')
                ->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {

            $attr = $request->validated();

            if ($request->file('icon') && $request->file('icon')->isValid()) {

                $path = storage_path('app/public/upload/kategori/');
                $filename = $request->file('icon')->hashName();
                $request->file('icon')->storeAs('upload/kategori', $filename, 'public');

                // delete old file from storage
                if ($category->icon != null && file_exists($path . $category->icon)) {
                    unlink($path . $category->icon);
                }

                $attr['icon'] = $filename;
            }

            $category->update($attr);

            return redirect()->route('admin.category.index')
                ->with('toast_success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect()->route('admin.category.index')
                ->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $path = storage_path('app/public/upload/kategori/');

            // delete old file from storage
            if ($category->icon != null && file_exists($path . $category->icon)) {
                unlink($path . $category->icon);
            }

            $category->delete();

            return redirect()->route('admin.category.index')
                ->with('toast_success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.category.index')
                ->with('toast_error', $th->getMessage());
        }
    }
}
