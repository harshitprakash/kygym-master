<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory
     */
    public function index()
    {
        $list = role::latest()->get();
        return view('pages.roles.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory
     */
    public function create()
    {
        return view('pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->inputValidate($request);
        $store = role::create($data);
        if (!$store) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        } else {
            return redirect()->route('roles.index')->with('success', 'Role Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory
     */
    public function edit($id)
    {
        $role = $this->decrypt($id);
        return view('pages.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->inputValidate($request);
        $role = $this->decrypt($id);
        $update = $role->update($data);
        if (!$update) {
            return redirect()->with('error', 'Update Failed - Server Error');
        } else {
            return redirect()->route('roles.index')->with('success', 'Role Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $role = $this->decrypt($id);
        $delete = $role->delete();
        if (!$delete) {
            return redirect()->with('error', 'Delete Failed - Server Error');
        } else {
            return redirect()->route('roles.index')->with('success', 'Role Deleted Successfully');
        }
    }

    public function inputValidate($request) {
        return $this->validate($request, [
            'role' => 'required|string',
            'description' => 'required|string',
        ]);
    }

    private function decrypt($id) {
        $id = Crypt::decrypt($id);
        $id = htmlspecialchars(stripslashes($id));
        return role::find($id);
    }
}
