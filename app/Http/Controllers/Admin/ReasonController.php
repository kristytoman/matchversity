<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyReasonRequest;
use App\Http\Requests\AddNewReasonRequest;
use App\Models\Reason;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReasonController extends Controller
{
    /**
     * Display a listing of reasons.
     * @return View
     */
    public function index(): View
    {
        return view('admin.reasons', [
            'reasons' => Reason::all()
        ]);
    }

    /**
     * Store a newly created reason in storage.
     *
     * @param AddNewReasonRequest $request
     * @return RedirectResponse
     */
    public function store(AddNewReasonRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Reason::create($validated['description_cz'], $validated['description_en'], true);
        return redirect()->route('admin.reasons.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VerifyReasonRequest $request
     * @param Reason $reason
     * @return RedirectResponse
     */
    public function update(VerifyReasonRequest $request, Reason $reason): RedirectResponse
    {
        $validated = $request->validated();

        // Try to connect reason with an existing one.
        if ($validated['connect']) {
            Reason::change($reason->id, $validated['connect']);
        } else {
            Reason::verify($reason->id, $validated);
        }

        return redirect()->route('admin.reasons.index');
    }

    /**
     * Remove the specified reason from storage.
     *
     * @param Reason $reason
     * @return RedirectResponse
     */
    public function destroy(Reason $reason): RedirectResponse
    {
        Reason::deleteSafely($reason->id);
        return redirect()->route('admin.reasons.index');
    }
}
