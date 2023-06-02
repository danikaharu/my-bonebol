<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\{StoreUserRequest, UpdateUserRequest};
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $user = User::latest()->get();
            return datatables()->of($user)
                ->addIndexColumn()
                ->addColumn('action', 'admin.user.include.action')
                ->toJson();
        }

        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $attr = $request->validated();

            User::create($attr);

            if ($request->file('avatar') && $request->file('avatar')->isValid()) {

                $filename = $request->file('avatar')->hashName();
                $request->file('avatar')->storeAs('upload/avatar', $filename, 'public');

                $attr['file'] = $filename;
            }

            return redirect()->route('admin.user.index')
                ->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->route('admin.user.index')
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {

            $attr = $request->validated();

            if ($request->file('avatar') && $request->file('avatar')->isValid()) {

                $path = storage_path('app/public/upload/avatar/');
                $filename = $request->file('avatar')->hashName();
                $request->file('avatar')->storeAs('upload/avatar', $filename, 'public');

                // delete old file from storage
                if ($user->avatar != null && file_exists($path . $user->avatar)) {
                    unlink($path . $user->avatar);
                }

                $attr['avatar'] = $filename;
            }

            $user->update($attr);

            return redirect()->route('admin.user.index')
                ->with('success', 'Data berhasil diedit');
        } catch (\Throwable $th) {
            return redirect()->route('admin.user.index')
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {

            $path = storage_path('app/public/upload/avatar/');

            // delete old file from storage
            if ($user->avatar != null && file_exists($path . $user->avatar)) {
                unlink($path . $user->avatar);
            }

            $user->delete();

            return redirect()->route('admin.user.index')
                ->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.user.index')
                ->with('error', $th->getMessage());
        }
    }
}
