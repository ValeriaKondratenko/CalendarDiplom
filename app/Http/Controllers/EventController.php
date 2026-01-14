<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::get();

        return view('event.index', compact('events'));
    }

    public function adminPage(){
        $events = Event::get();

        return view('event.adminPage', compact('events'));
    }

    public function eventsPage(){
        $events = Event::get();

        return view('event.eventsPage', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Проверка введенных данных
        //Если будут ошибки, то возникает исключение
        //Иначе возвращаются данные формы
        $data = $request->validate([
           'imageEvent' => 'required',
            'title'=> 'required',
            'status'=> 'required',
            'description'=> 'required',
            'dateEvent'=> 'required',
            'timeEvent'=>'required',
            'endEvent'=>'required',
        ]);

        $event = new Event();
        // Заполнение статьи данными из формы
        $event->fill($data);
        // При ошибках сохранения возникнет исключение
        $event->save();

        // Редирект на указанный маршрут
        return redirect()->route('adminPage');
    }

    //вывод формы
    public function create()
    {
        //Передается в шаблон вновь созданный объект, для вывода формы
        $event = new Event();
        return view('event.create', compact('event'));
    }

    public function edit($id){

        $event = Event::findOrFail($id);
        return view('event.edit', compact('event'));
    }

    public function update(Request $request, $id){
        $event = Event::findOrFail($id);
        $data = $request->validate([
            // У обновления немного измененная валидация
            // В проверку уникальности добавляется название поля и id текущего объекта
            // Если этого не сделать, Laravel будет ругаться, что имя уже существует
            'imageEvent' => "required",
            'title'=> 'required',
            'status'=> 'required',
            'description'=> 'required',
            'dateEvent'=> 'required',
            'timeEvent'=>'required',
            'endEvent'=>'required',
        ]);

        $event->fill($data);
        $event->save();
        return redirect()->route('adminPage');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)//в примере параметр такой, поэтому тоже написала
    {
        $event = Event::findOrFail($id);
        return view('event.show', compact('event'));
    }


    // Удаление должно быть доступно только тем, кто может его выполнять
    public function destroy($id){
        // DELETE — идемпотентный метод, поэтому результат операции всегда один и тот же
        $event = Event::findOrFail($id);
        if($event){
            $event->delete();
        }
        return redirect()->route('adminPage');
    }



}
