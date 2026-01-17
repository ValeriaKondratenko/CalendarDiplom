<?php

namespace App\Http\Controllers;
use App\Models\Region;
use Illuminate\Http\Request;
class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('region.regionShow', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'name' => 'required',
        ]);

        $region = new Region();
        $region->fill($data);
        $region->save();
        return redirect()->route('admin.regions');
    }

    //вывод формы
    public function create()
    {
        $region = new Region();
        return view('region.regionCreate', compact('region'));

    }

    public function edit($id){
        $region = Region::findOrFail($id);

        return view('region.regionEdit', compact('region'));
    }

    public function update(Request $request, $id){
        $region = Region::findOrFail($id);
        $data = $request->validate([
           'name' => 'required',
        ]);

        $region->fill($data);
        $region->save();
        return redirect()->route('admin.regions');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)//в примере параметр такой, поэтому тоже написала
    {

    }


    // Удаление должно быть доступно только тем, кто может его выполнять
    public function destroy($id){
        $region = Region::findOrFail($id);

        if($region){
            $region->delete();
        }

        return redirect()->route('admin.regions');
    }

}
