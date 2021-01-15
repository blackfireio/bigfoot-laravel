<?php

namespace App\Http\Controllers;

use App\Models\BigFootSighting;
use Illuminate\Http\Request;

class SightingsController extends Controller
{
    public function index()
    {
        $sightings = BigFootSighting::withCount('comments')
            ->limit(50)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('sightings.list', ['sightings' => $sightings]);
    }

    public function show(BigFootSighting $sighting)
    {
        return view('sightings.view', ['sighting' => $sighting]);
    }
}
