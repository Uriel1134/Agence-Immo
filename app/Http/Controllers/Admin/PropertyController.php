<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index',[
            'properties' => Property::orderBy('create_at', 'desc')->paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
           'surface' => 48,
           'rooms' => 3,
           'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Abomey Calavi',
            'postal_code' => 22900,
            'sold' => false,

        ]);
        return view('admin.properties.form', [
            'property'=>new Property()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request): \Illuminate\Http\RedirectResponse
    {
        $property = Property::create($request->validated());
        return to_route('admin.property.index')-> with('success', 'Le bien a été bien créé');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success', 'Le bien a été bien modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property )
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Le bien a été bien supprimer');
    }
}
