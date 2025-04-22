<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeasonRequest;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function store(SeasonRequest $request)
    {
        $validatedData = $request->validated();
        $season = Season::create($validatedData);
        return redirect()->route('seasons.index');
    }
}
