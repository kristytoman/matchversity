<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportMobilitiesRequest;
use App\Http\Requests\StoreMobilitiesRequest;
use App\Models\Mobility;
use App\Models\Validation\FileValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MobilityController extends Controller
{
    /**
     * Display a listing of mobilities.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.mobilities', [
                'mobilities' => Mobility::paginate(30)
            ]
        );
    }

    /**
     * Import data from the resource file.
     *
     * @param ImportMobilitiesRequest $request
     * @return View|RedirectResponse
     */
    public function import(ImportMobilitiesRequest $request): View|RedirectResponse
    {
        $fileValidator = new FileValidator;
        $validated = $request->validated();

        // Try to parse and validate the file data.
        if (!($mobilities = ($fileValidator->getData($validated['file'])))) {
            return back()->withErrors([
                'Wrong file' => 'The file has too many errors to be parsed.'
            ]);
        }

        // Import correct mobilities.
        Mobility::import($mobilities);

        // Try to return the incorrect data to admin.
        if ($fileValidator->toCheck) {
            return view('admin.data_check', [
                'count' => $fileValidator->getCount(),
                'mobilities' => $fileValidator->toCheck
            ]);
        } else {
            return redirect()->route('admin.mobilities.index');
        }
    }

    /**
     * Store validated mobilities.
     *
     * @param StoreMobilitiesRequest $request
     */
    public function store(StoreMobilitiesRequest $request): View|RedirectResponse
    {
        $fileValidator = new FileValidator;

        // Validate data from the request.
        Mobility::import($fileValidator->revalidate($request->validated()));

        // Try return incorect data.
        if ($fileValidator->toCheck) {
            return view('admin.data_check', [
                'count' => $fileValidator->getCount(),
                'mobilities' => $fileValidator->toCheck
            ]);
        }

        return redirect()->route('admin.mobilities.index');
    }
}
