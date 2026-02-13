<?php

namespace App\Http\Controllers;

use App\Models\Owner;
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
     * Show the form for modifying owner information.
     */
    public function showModifyForm()
    {
        return view('owners.modify');
    }
}
