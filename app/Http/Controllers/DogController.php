<?php

namespace App\Http\Controllers;

use App\Http\Services\DogApiService;
use App\Models\FavoriteDog;
use Illuminate\Http\Request;

class DogController extends Controller
{
public function __construct(private DogApiService $dogApi) {}


public function index(Request $request)
{
$breed = $request->get('breed');
return view('dogs.index', [
'breeds' => $this->dogApi->getBreeds(),
'image' => $this->dogApi->randomImage($breed),
'selectedBreed' => $breed
]);
}

public function store(Request $request)
{
    $validated = $request->validate([
        'breed' => 'required|string|max:255',
        'image_url' => 'required|url',
    ]);

    FavoriteDog::create($validated);

    return back()->with('success', 'Added to favorites!');
}


public function favorites()
{
return view('dogs.favorites', [
'favorites' => FavoriteDog::latest()->paginate(12)
]);
}


public function destroy(FavoriteDog $favoriteDog)
{
$favoriteDog->delete();
return back()->with('success', 'Favorite removed');
}
}
