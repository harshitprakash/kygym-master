<?php

namespace App\Http\Controllers;

use App\Models\diet_plan;
use App\Models\RequestDiet;
use App\Models\User;
use Crypt;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class DietController extends Controller
{
    /**
     * Display Diet Requests!
     *
     * @return Application|Factory|View
     */
    public function index() {
        $list = RequestDiet::where('assign', '0')->get();
        return view('pages.diet.index', compact('list'));
    }

    /**
     * Assign Diet Manually to a user.
     *
     * @return Application|Factory|View
     */
    public function create() {
        return view('pages.diet.assign');
    }

    /**
     * Create & Store DIET in Server!
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) {
        $data = $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'level' => 'required|string'
        ]);
        diet_plan::create($data);
        return redirect()->back()->with('success', 'Diet Created Successfully!');

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

    /**
     * @param int $id
     */
    public function AssignDiet($id) {
        $id = htmlspecialchars(stripslashes($id));
        $member = User::find($id);
        return view('pages.diet.diets', compact('member'));
    }

    public function InitAssign($member, $diet) {
        $member = User::find($this->DecryptingProcess(htmlspecialchars(stripslashes($member))));
        $diet = diet_plan::find(htmlspecialchars(stripslashes($diet)));
        return view('pages.diet.cpay', compact('member', 'diet'));

    }

    protected function DecryptingProcess($input) {
        return Crypt::decrypt($input);
    }
}
