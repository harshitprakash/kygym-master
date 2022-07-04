<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos=Video::latest()->get();
        return view('pages.video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.video.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimetypes:video/mp4',
            'visibility'=> 'required|string',
            'description' => 'required|string|max:255',
        ]);
        $video = new Video();
        $video->title = $request->title;
        $video->description = $request->description;
        $video->visibility= $request->visibility;
        $video->uploaded_by = Auth::user()->id;
        if ($request->hasFile('video'))
        {
            $video=time().'.'.request()->file->getClientOriginalExtension();
            $path = $request->file('video')->store('videos', ['disk' =>  'my_files']);
            $video->video = $path;
            $data= $video->save();
            if(!$data) {
                return redirect()->back()->with('error', 'Something went wrong. try again!');
            } else {
                return redirect()->route('video.index')->with('success', 'Video  Uploaded Successfully');
            }
        }

    }

    /**
     * @param $request
     * @throws ValidationException
     */
    protected function video_validate($request){
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description'=>'nullable|string|max:225',
            'video' => 'required|file|mimetypes:video/*',
            'member_id'=>'nullable|string',
        ]);
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
        //
    }
}
