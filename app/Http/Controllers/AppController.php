<?php

namespace App\Http\Controllers;

use App\Models\AppRequests;
use App\Models\diet_plan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * App Landing Render function.
     *
     * @return Application|Factory|View
     */
    public function AppLanding() {
        return view('app.landing');
    }

    /**
     * Rendering the Diet listing page.
     *
     * @return Application|Factory|View
     */
    public function DietListing() {
        return view('app.diet');
    }

    /**
     * Handling the App data storing of Diet & Supplements
     *
     * @param Request $request - data posted on server.
     * @param $mode - mode of registration
     * @return RedirectResponse
     */
    public function DietHandler(Request $request, $mode) {
        $data = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|digits:10',
            'place' => 'required|string'
        ]);
        AppRequests::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'place' => $data['place'],
            'for' => $mode
        ]);
        return redirect()->back()->with('success', 'Requested successfully! we will contact you soon');
    }

    /**
     * Rendering the supplement Listing page.
     *
     * @return Application|Factory|View
     */
    public function SupplementsListing() {
        return view('app.supplements');
    }
}
