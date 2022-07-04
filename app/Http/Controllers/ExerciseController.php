<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\PostImages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {  $data= Exercise::latest()->get();
        return view('ex',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.exercises.data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'cat_id'=>'required',
            'exercise_name'=>'required|string',
            'instructions'=>'required|string',
            'effect_on'=> 'bail|required|array',
            'effect_on.*' => 'bail|required|string|distinct',
        ]);

        foreach ($data['effect_on'] as $value) {
            $insert[] = $value;
        }
        /** @var array  $insert */
        $data['effect_on'] = json_encode($insert);
        $storeExercise = DB::table('exercises')->insert([
            'cat_id' => $data['cat_id'],
            'exercise_name' => $data['exercise_name'],
            'instructions' => $data['instructions'],
            'effect_on' => $data['effect_on'],
        ]);
        if (!$storeExercise) {
            return redirect()->back()->with('error', 'Something went wrong. try again!');
        } else {
            return redirect()->route('exercise.data.index')->with('success', 'Exercise Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
