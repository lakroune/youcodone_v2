<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\TypeCuisine;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

use function Symfony\Component\String\b;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $restaurant = Restaurant::all();
        return view('restaurant.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_cuisines = TypeCuisine::all();
        return view('restaurants.create', compact('type_cuisines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $validated = $request->validated();

        try {
            return DB::transaction(function () use ($validated, $request) {
                $restaurant = Restaurant::create([
                    'nom_restaurant' => $validated['nom_restaurant'],
                    'adresse_restaurant' => $validated['adresse_restaurant'],
                    'telephone_restaurant' => $validated['telephone_restaurant'],
                    'description_restaurant' => $validated['description_restaurant'],
                    'email_restaurant' => $validated['email_restaurant'],
                    'capacity' => $validated['capacity'],
                    'type_cuisine_id' => $validated['type_cuisine_id'],
                    'user_id' => Auth::id(),
                ]);

                if ($request->hasFile('image_principal')) {
                    $path = $request->file('image_principal')->store('photos', 'public');
                    $restaurant->photos()->create([
                        'url_photo' => $path,
                        'is_principal' => true,
                    ]);
                }

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $path = $image->store('photos', 'public');
                        $restaurant->photos()->create([
                            'url_photo' => $path,
                            'is_principal' => false,
                        ]);
                    }
                }

                $menu = $restaurant->menus()->create(); // 

                // foreach ($validated['menu'] as $menuItem) {
                //     $menu->plats()->create([
                //         'nom_plat' => $menuItem['nom_plat'],   // 
                //         'prix_plat' => $menuItem['prix_plat'], // 
                //     ]);
                // }

                return redirect()->route('restaurants.create')->with('success', 'Restaurant created successfully!');
            });
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error . Please try again.']);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $restuarant = Restaurant::findOrFail($restaurant->id);
        return view('restaurants.show', compact('restuarant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(Restaurant $restaurant)
    {
        if (Auth::user()->id() !== $restaurant->user_id) {
            return redirect()->back()->with('error', "Action non autorisée.");
        }

        if ($restaurant->image) {
            Storage::disk('public')->delete($restaurant->image);
        }

        $restaurant->delete();

        return redirect()->route('restaurateur.dashboard')->with('success', 'Restaurant supprimé avec succès.');
    }
}
