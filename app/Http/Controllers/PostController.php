<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
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
        $data= $this->validate_input($request);
        $insert = Post::create($data);

        if (!$insert) {
            return redirect()->back()->with('error','Something Went Wrong!');
        } else {
            $request->validate([
                'imageFile' => 'required',
                'imageFile.*' => 'mimes:jpeg,jpg,png,gif|max:2048'
            ]);
            if($request->hasfile('imageFile')) {
                foreach($request->file('imageFile') as $file)
                {
                    $add = $insert->id.'-'.rand(1, 1000);
                    $name = $add.$file->getClientOriginalName();
                    $file->move(public_path().'/images/post/', $name);
                    $image[] = $name;
                }
                /** @var mixed  $image */
                $storeIMG = PostImages::create([
                    'name' => json_encode($image),
                    'image_path' => '0',
                    'post_id' => $insert->id,
                ]);
                if (!$storeIMG) {
                    return redirect()->back()->with('success', 'Post Created but unable to insert images');
                } else {
                    return redirect()->back()->with('success', 'Post Created & Images Uploaded Successfully');
                }
            }
        }
    }

    /**
     * @param string $id
     * @return mixed
     */
    private function decrypt($id)
    {
        $id= Crypt::decrypt($id);
        $id= htmlspecialchars(stripslashes($id));
        return Post::find($id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    public function validate_input(Request $request){

        return $request->validate([
            'member'=>'required|string',
            'title'=>'required|string|min:5|max:50',
            'description'=>'required|string|min:20|max:250',
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
