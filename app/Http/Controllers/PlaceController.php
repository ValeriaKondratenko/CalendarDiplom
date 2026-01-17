<?php

namespace App\Http\Controllers;


use App\Models\Place;
use App\Models\Region;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::with('region')->get();

        return view('place.placesShow', compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]);

        $place = new Place();
        $place->fill($data);
        $place->save();

        return redirect()->route('admin.places');
    }

    //вывод формы
    public function create()
    {
        $place = new Place();
        $regions = Region::all();

        return view('place.placeCreate', compact('place', 'regions'));

    }

    public function edit($id){
        $place = Place::findOrFail($id);
        $regions = Region::all();

        return view('place.placeEdit', compact('place', 'regions'));
    }

    public function update(Request $request, $id){
        $place = Place::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'region_id' => 'required|exists:regions,id',
        ]);

        $place->fill($data);
        $place->save();

        return redirect()->route('admin.places');

    }


    /**
     * Display the specified resource.
     */
    public function show($id)//в примере параметр такой, поэтому тоже написала
    {

    }


    // Удаление должно быть доступно только тем, кто может его выполнять
    public function destroy($id){
        $places = Place::with('region')->findOrFail($id);

        if($places){
            $places->delete();
        }

        return redirect()->route('admin.places');
    }



}
