<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMobilityRequest;
use App\Models\Mobility;
use App\Models\Reason;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MobilityController extends Controller
{
    /**
     * Display a listing of user's mobilities.
     *
     * @return View
     */
    public function index(): View
    {
        return view('mobilities.get_mobilities', [
            'mobilities' => User::getStudentsMobilities('hash')
        ]);
    }

    /**
     * Show the form for editing the user's mobility.
     *
     * @param int $id
     * @return View
     */
    public function edit($id): View
    {
        return view('mobilities.rate_mobility', [
            'mobility' => Mobility::find($id),
            'reasons' => Reason::all()
        ]);
    }

    /**
     * Update the specified mobility in storage.
     *
     * @param UpdateMobilityRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateMobilityRequest $request, int $id): RedirectResponse
    {
        $mobility = Mobility::find($id);
        if ($mobility instanceof Mobility) {
            $mobility->updateMobility($request->validated());
        }
        return redirect()->route('mobilities.index');
    }
}
