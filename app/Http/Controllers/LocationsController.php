<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;


class LocationsController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth', 'check.admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $locations = Locations::get();
        $locations = Locations::latest()->paginate(10);
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'departure' => "required|string|max:50",
            'destination' => ['required', 'string', 'max:50'],
            'price' => "required|integer",
            'passengers' => "required|integer|max:40"
        ]);
    
        Locations::create([
            'destination' => $request->input('destination'),
            'departure' => $request->input('departure'),
            'price' => $request->input('price'),
            'passengers' => $request->input('passengers')
        ]);

        // return redirect('/');
        // return redirect()->route('locations.create');
        return back()->with('success', "Location has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $location = Locations::where('id', '=', $id)->first();
        // $location = Locations::find($id);


        // $location = Locations::where('id', $id)->firstOrFail();
        $location = Locations::findOrFail($id);

        
       return view('locations.edit', compact('location'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'departure' => "required|string|max:50",
            'destination' => ['required', 'string', 'max:50'],
            'price' => "required|integer",
            'passengers' => "required|integer|max:40"
        ]);
    
        Locations::where('id', $id)->update([
            'destination' => $request->input('destination'),
            'departure' => $request->input('departure'),
            'price' => $request->input('price'),
            'passengers' => $request->input('passengers')
        ]);

        return back()->with('success', "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Locations::where('id', $id)->delete();
        return back()->with('success', "Location has been deleted");
    }
}
