<?php

namespace App\Http\Controllers;

use App\Models\Border;
use App\Models\City;
use App\Models\Country;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::all();
        $cities = City::all();
        $borders = Border::all();

        return view('routes.index', compact('routes', 'borders', 'cities'));
    }

    // public function index()
    // {
    //     $routes = Route::with('borders')->get();
    //     $cities = City::all();
    //     $borders = Border::all();

    //     return view('routes.index', compact('routes', 'borders', 'cities'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'origin_city_id' => 'nullable|integer',
            'destination_city_id' => 'nullable|integer',
            'border_id' => 'array',
            'route' => 'required|string',
            'fare' => 'nullable|integer',

        ]);

        $route = new Route();

        $route->origin_city_id = $validatedData['origin_city_id'];
        $route->destination_city_id = $validatedData['destination_city_id'];
        $route->border_id = implode(',', $validatedData['border_id']);
        $route->route = $validatedData['route'];
        $route->fare = $validatedData['fare'] ?? 0;
        $route->created_by = Auth::user()->creatorId();
        $route->save();

        return redirect()->route('routes.index')->with('success', 'Route created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function update(Request $request, Route $route)
    // {
    //     // Validate incoming data
    //     $validatedData = $request->validate([
    //         'origin_city_id' => 'nullable|integer',
    //          'destination_city_id' => 'nullable|integer',
    //         'border_id' => 'required|integer',
    //         'route' => 'required|string',
    //         'fare' => 'nullable|integer',
    //         // 'created_by' => 'nullable|integer',
    //     ]);

    //     // Populate the model with validated data
    //     $route->origin_city_id = $validatedData['origin_city_id'];
    //     $route->destination_city_id = $validatedData['destination_city_id'];
    //     $route->border_id = $validatedData['border_id'];
    //     $route->route = $validatedData['route'];
    //     $route->fare = $validatedData['fare'] ?? 0;
    //     // $border->created_by = $validatedData['created_by'];

    //     // Save the updated model to the database
    //     $route->save();

    //     // Optionally, you can redirect the user after successful update
    //     return redirect()->route('routes.index')->with('success', 'Routes updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        // Find the route by its ID
        $route = Route::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([

            'origin_city_id' => 'required|integer', // Ensure it's required
            'destination_city_id' => 'nullable|integer',
            'border_id' => 'required|integer',
            'route' => 'required|string',
            'fare' => 'nullable|integer',
            // 'created_by' => 'nullable|integer',
        ]);

        // Update the route with the validated data
        $route->update($validatedData);

        // Return a response indicating success
        return redirect()->route('routes.index')->with('success', 'Routes updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();

        return redirect()->route('routes.index')
            ->with('success', 'Route deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function create()
    {
        $cities = City::all();
        $borders = Border::all();

        return view('routes.create', compact('cities', 'borders'));
    }

    public function show($id)
    {
        $route = Route::find($id);

        return view('routes.show', compact('route'));
    }

    public function edit($id)
    {
        $route = Route::find($id);
        $cities = City::all();
        $countries = Country::all();
        $borders = Border::all();

        return view('routes.edit', compact('route', 'cities', 'countries', 'borders'));
    }
}
