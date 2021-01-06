<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SightingsController extends Controller
{
    public function index()
    {
        return view('sightings.list');
    }

    public function show($id)
    {
        return view('sightings.view', ['sighting' => $id]);
    }
}
