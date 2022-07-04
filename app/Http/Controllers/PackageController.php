<?php

namespace App\Http\Controllers;

use App\Models\packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= packages::latest()->get();
        return view('pages.package.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $this->validate_input($request);
        $insert= packages::create($data);

        if (!$insert) {
            return redirect()->back()->with('error', 'Something went wrong. try again!');
        } else {
            return redirect()->route('package.index')->with('success', 'Package  Created Successfully');
        }
    }


    private function validate_input( $request)
    {
        return $this->validate($request,[
            'duration' => 'required|integer',
            'package' => 'required|string',
            'description' => 'required|string',
            'price'=>'required|integer',
            'personal_trainer'=> 'nullable|boolean'

        ]);
    }

    public function IdDecrypt($id)
    {
        $id = Crypt::decrypt($id);
        $id = htmlspecialchars(stripslashes($id));
        return packages::find($id);
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= $this->IdDecrypt($id);
        return view('pages.package.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $package =  $this->IdDecrypt($id);
        $data=  $this->validate_input($request);
        $update = $package->update($data);
        if (!$update) {
            return redirect()->back()->with('error', 'Package Update Failed!');
        } else {
            return redirect()->route('package.index')->with('success', 'Package Updated Successfully!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
