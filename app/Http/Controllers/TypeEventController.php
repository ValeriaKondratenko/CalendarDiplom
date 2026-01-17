<?php

namespace App\Http\Controllers;
use App\Models\TypeEvent;
use Illuminate\Http\Request;
class TypeEventController extends Controller
{
    public function index()
    {
        $typeEvents = TypeEvent::all();
        return view('typeEvents.typeEventShow', compact('typeEvents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        $typeEvent = new TypeEvent();
        $typeEvent->fill($data);
        $typeEvent->save();
        return redirect()->route('admin.typeEvents');

    }

    //вывод формы
    public function create()
    {
        $typeEvent = new TypeEvent();
        return view('typeEvents.typeEventCreate', compact('typeEvent'));

    }

    public function edit($id){
        $typeEvent = TypeEvent::findOrFail($id);
        return view('typeEvents.typeEventEdit', compact('typeEvent'));
    }

    public function update(Request $request, $id){
        $typeEvent = TypeEvent::findOrFail($id);
        $data = $request->validate([
            'name' => 'required'
        ]);

        $typeEvent->fill($data);
        $typeEvent->save();
        return redirect()->route('admin.typeEvents');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)//в примере параметр такой, поэтому тоже написала
    {

    }


    // Удаление должно быть доступно только тем, кто может его выполнять
    public function destroy($id){
        $typeEvent = TypeEvent::findOrFail($id);
        if($typeEvent){
            $typeEvent->delete();
        }
        return redirect()->route('admin.typeEvents');
    }

}
