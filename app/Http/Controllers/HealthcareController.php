<?php

namespace App\Http\Controllers;

use App\Models\Healthcare;
use App\Models\user_info;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HealthcareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->InputValidate($request);
        $data['height'] = ($data['height'] / 100);
        $data['bmi'] = ($data['weight'] / ($data['height'] * $data['height']));
        $data['member_id'] = $request['member_id'];
        $insert = Healthcare::create($data);
        if (!$insert) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        } else {

            return redirect()->back()->with('success', 'Your are underweight Your BMI is '. round($data['bmi']));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        $member= $this->decrypt($id);
        return view('',compact('member'));
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

    public function bmi_validate($data)
    {
        return $this->validate($data, [
            'height' => 'nullable',//basic
            'weight' => 'nullable',//basic
            'bmi' => 'nullable',//basic

        ]);
    }
    private function decrypt($id)
    {
        $id= crypt::decrypt($id);
        $id= htmlspecialchars(stripslashes($id));
        return user_info::find($id);
    }

    private function InputValidate($request) {

        return $this->validate($request,[
            'height'=> 'required|integer',
            'weight'=>'required|integer',
        ]);

    }
}
