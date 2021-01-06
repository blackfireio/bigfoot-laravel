<?php

namespace App\Http\Controllers;

use App\Models\BigFootSighting;
use Illuminate\Http\Request;

class SightingsController extends Controller
{
    public function index()
    {
        $sightings = BigFootSighting::limit(50)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('sightings.list', ['sightings' => $sightings]);
    }

    public function show($id)
    {
        return view('sightings.view', ['sighting' => $id]);
    }
}
