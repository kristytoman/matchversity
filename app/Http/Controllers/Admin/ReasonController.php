<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyReasonRequest;
use App\Http\Requests\AddNewReasonRequest;
use App\Models\Reason;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reasons', [
            'reasons'=> Reason::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AddNewReasonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewReasonRequest $request)
    {
        $validated = $request->validated();
        Reason::create($validated['description_cz'], $validated['description_en'], true);
        return redirect()->route('admin.reasons.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\VerifyReasonRequest  $request
     * @param  \App\Models\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function update(VerifyReasonRequest $request, Reason $reason)
    {
        $validated = $request->validated();
        if ($validated['connect']) {
            Reason::change($reason->id, $validated['connect']);
        }
        else {
            Reason::verify($reason->id, $validated);
        }
        return redirect()->route('admin.reasons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reason $reason
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reason $reason)
    {
        // authorize
        Reason::deleteSafely($reason->id);
        return redirect()->route('admin.reasons.index');
    }
}
