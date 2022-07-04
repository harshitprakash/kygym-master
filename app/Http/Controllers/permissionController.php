<?php

namespace App\Http\Controllers;

use App\Models\permission;
use App\Models\role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        return abort('404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $role
     * @return Application|Factory|View
     */
    public function create($role)
    {
        $role = role::find($role);
        return view('pages.permissions.assign', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role_id' => 'required|integer',
            'permissions' => 'required',
            'permissions.*' => 'required|array',
        ]);

        $data['role_id'] = $request['role_id'];
        $data['permissions'] = $request['permissions'];

        $role = permission::create($data);
        if (!$role) {
            return redirect()->back()->with('error', 'Permission Creation Failed');
        } else {
            return redirect()->route('roles.index')->with('success', 'Permission Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $pid = Crypt::decrypt($id);
        $pid = htmlspecialchars(stripslashes($pid));
        $check = permission::get()->where('role_id', '=', $pid)->first();
        if (!$check) {
            return $this->create($pid);
        } else {
            return $this->edit($pid);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $permission = permission::get()->where('role_id', '=', $id)->first();
        return view('pages.permissions.edit', compact('permission'));
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
        $this->validate($request, [
            'permissions' => 'required',
            'permissions.*' => 'required|array',
        ]);
        $pid = Crypt::decrypt($id);
        $permission = permission::find($pid);
        $data['permissions'] = $request['permissions'];
        $update = $permission->update($data);
        if (!$update) {
            return redirect()->back()->with('error', 'Permission Update Failed!');
        } else {
            return redirect()->route('roles.index')->with('success', 'Permission Updated Successfully!');
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
        $pid = Crypt::decrypt($id);
        $permission = permission::find($pid);
        $delete = $permission->delete();
        if (!$delete) {
            return redirect()->back()->with('error', 'Permission Delete Failed!');
        } else {
            return redirect()->route('permission.index')->with('success', 'Permission Deleted Successfully!');
        }
    }
}
