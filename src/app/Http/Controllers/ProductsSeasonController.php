<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSeasonRequest;
use App\Models\ProductSeason;
use Illuminate\Http\Request;

class ProductSeasonController extends Controller
{
    public function store(ProductSeasonRequest $request)
    {
        $validatedData = $request->validated();
        $productSeason = ProductSeason::create($validatedData);
        return redirect()->route('product_seasons.index');
    }
}
