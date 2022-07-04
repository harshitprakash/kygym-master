<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiryes=Enquiry::all();
        return view('pages.enquiry.index',compact('enquiryes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate= $this->validate($request,[
            'Firstname'=> 'required',
            'Lastname'=>'required',
            'Email'=>'required',
            'date'=>'required',
            'PhoneNo'=>'required'
        ]);

        $enquiry= Enquiry::create([
            'Firstname'=> $validate['Firstname'],
            'Lastname'=>$validate['Lastname'],
            'Email'=>$validate['Email'],
            'date'=>$validate['date'],
            'PhoneNo'=>$validate['PhoneNo'],
        ]);
        return redirect()->route('index.index')->with('success','Enquiry created successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id= Crypt::decrypt($id);
        $Enquiry=Enquiry::find($id);
        $Enquiry->delete();
        return redirect()->route('index.index')->with('success','Enquiry deleted successfully ..!');
    }
}
