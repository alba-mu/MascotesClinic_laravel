<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Requests\OwnerSearchRequest;
use App\Http\Requests\OwnerUpdateRequest;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of all owners.
     */
    public function index()
    {
        $owners = Owner::all();
        return view('owners.list', compact('owners'));
    }

    /**
     * Show the form for searching pets by owner.
     */
    public function showSearchForm()
    {
        return view('owners.search');
    }

    /**
     * Search for an owner and display their pets.
     */
    public function searchPets(OwnerSearchRequest $request)
    {
        $validated = $request->validated();
        
        $owner = Owner::with('pets')->findOrFail($validated['id']);
        $pets = $owner->pets;

        return view('owners.search', compact('owner', 'pets'));
    }

    /**
     * Show the form for modifying owner information.
     */
    public function showModifyForm(Request $request)
    {
        // If there's an owner_id in session, load the owner
        if ($request->session()->has('owner_id')) {
            $ownerId = $request->session()->get('owner_id');
            $owner = Owner::find($ownerId);
            $request->session()->forget('owner_id');
            return view('owners.modify', compact('owner'));
        }
        
        return view('owners.modify');
    }

    /**
     * Search for owner to modify.
     */
    public function searchForModify(Request $request)
    {
        $validated = $request->validate([
            'search_id' => ['required', 'numeric', 'exists:owners,id']
        ], [
            'search_id.required' => 'L\'Id és obligatori',
            'search_id.numeric' => 'L\'Id ha de ser un valor vàlid',
            'search_id.exists' => 'L\'Id no existeix',
        ]);

        // Redirect back with owner_id in session
        return redirect()->route('owner.modify')->with('owner_id', $validated['search_id']);
    }

    /**
     * Update owner information.
     */
    public function update(OwnerUpdateRequest $request)
    {
        $validated = $request->validated();
        
        $owner = Owner::findOrFail($validated['id']);
        
        // Check if there are changes
        if ($owner->email === $validated['email'] && $owner->movil === $validated['movil']) {
            return redirect()->route('owner.modify')
                ->with('error', 'No hi ha canvis per guardar')
                ->with('owner_id', $owner->id);
        }

        $owner->update([
            'email' => $validated['email'],
            'movil' => $validated['movil']
        ]);

        return redirect()->route('owner.modify')
            ->with('success', 'Dades actualitzades correctament')
            ->with('owner_id', $owner->id);
    }
}
