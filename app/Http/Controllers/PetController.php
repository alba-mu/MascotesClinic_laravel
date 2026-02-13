<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Http\Requests\PetUpdateRequest;
use App\Http\Requests\PetSearchRequest;
use App\Http\Requests\HistoryStoreRequest;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of all pets.
     */
    public function index()
    {
        $pets = Pet::all();
        return view('pets.list', compact('pets'));
    }

    /**
     * Show the form for editing the specified pet.
     */
    public function edit(Request $request, $id)
    {
        $pets = Pet::all();
        $petToEdit = Pet::findOrFail($id);
        
        return view('pets.list', compact('pets', 'petToEdit'));
    }

    /**
     * Update the specified pet from list view.
     */
    public function updateFromList(PetUpdateRequest $request)
    {
        $validated = $request->validated();
        
        $pet = Pet::findOrFail($validated['id']);
        
        // Check if there are changes
        if ($pet->nom === $validated['nom'] && $pet->propietari_id == $validated['propietari_id']) {
            return redirect()->route('pet.edit', $pet->id)->with('error', 'No hi ha canvis per guardar');
        }

        $pet->update([
            'nom' => $validated['nom'],
            'propietari_id' => $validated['propietari_id']
        ]);

        return redirect()->route('pet.edit', $pet->id)->with('success', 'Dades actualitzades correctament');
    }

    /**
     * Show the form for searching pet details.
     */
    public function showSearchForm()
    {
        return view('pets.search');
    }

    /**
     * Search for a pet and display its details, owner info, and history.
     */
    public function searchDetail(PetSearchRequest $request)
    {
        $validated = $request->validated();
        
        $pet = Pet::with(['owner', 'history' => function($query) {
            $query->orderBy('data', 'desc');
        }])->findOrFail($validated['id']);

        return view('pets.search', compact('pet'));
    }

    /**
     * Show the form for adding a history entry.
     */
    public function showAddHistoryForm()
    {
        return view('pets.history');
    }

    /**
     * Store a new history entry for a pet.
     */
    public function storeHistory(HistoryStoreRequest $request)
    {
        $validated = $request->validated();

        $pet = Pet::findOrFail($validated['mascota_id']);
        
        $pet->history()->create([
            'data' => $validated['data'],
            'motiu_visita' => $validated['motiu_visita'],
            'descripcio' => $validated['descripcio'],
        ]);

        return redirect()->route('pet.history')->with('success', 'Entrada d\'historial afegida correctament');
    }
}
