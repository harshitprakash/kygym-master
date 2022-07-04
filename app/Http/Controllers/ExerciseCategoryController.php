<?php

namespace App\Http\Controllers;

use App\Models\ExerciseCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ExerciseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = ExerciseCategory::latest()->get();
        return view('pages.exercises.data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $this->validate($request,[
            'cat_name'=>'required|string|min:3|max:50|unique:exercise_categories'
        ]);
        $insert=ExerciseCategory::create($data);
        if (!$insert) {
            return redirect()->back()->with('error', 'Something went wrong. try again!');
        } else {
            return redirect()->route('manage.create')->with('success', 'Category Created Successfully');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= $this->decryptId($id);
        return view('pages.exercises.data.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Category =  $this->decryptId($id);
        $data= $this->validate($request,[
            'cat_name'=>'required|string|min:3|max:50'
        ]);
        $update = $Category->update($data);
        if (!$update) {
            return redirect()->back()->with('error', 'Category Update Failed!');
        } else {
            return redirect()->route('manage.index')->with('success', 'Category Updated Successfully!');
        }
    }

    public function decryptId($id){

        $id=Crypt::decrypt($id);
        $id = htmlspecialchars(stripslashes($id));
        return ExerciseCategory::find($id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->decryptId($id);
        $delete= $user->delete();
        if (!$delete) {
            return redirect()->back()->with('error', 'Unable to Delete Please Try Again!');
        } else {
            return redirect()->route('manage.index')->with('success', 'Deleted Successfully.');
        }
    }
}


