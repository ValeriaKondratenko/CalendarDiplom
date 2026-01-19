<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organization;
use App\Models\Place;
use App\Models\TypeEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $events = Event::get();
        $events = Event::with('media')->get();
        $types = TypeEvent::all();

        return view('event.index', compact('events', 'types'));
    }

    public function likesPage(){
        $events = auth()->user()->favoriteEvents;

        return view('event.likesPage', compact('events'));
    }

    public function addToFavorite($id)
    {
        $event = Event::findOrFail($id);

        // если мероприятие уже прошло
        if ($event->dateEvent->isPast()) {
            return back()->with('error', 'Нельзя добавить прошедшее мероприятие в избранное');
        }

        auth()->user()
            ->favoriteEvents()
            ->syncWithoutDetaching([$id]);//строчка говорит о том что добавь в избранное мероприятие но не удаляй другие

        return back()->with('success', 'Мероприятие добавлено в избранное');
    }

    public function removeFromFavorite($id)
    {
        auth()->user()
            ->favoriteEvents()
            ->detach($id);

        return back();
    }


    public function adminPage(){
        $events = Event::get();
        $types = TypeEvent::all();

        return view('event.adminPage', compact('events', 'types'));
    }

    public function eventsPage(){
        $events = Event::whereDate('dateEvent', '>=', date('Y-m-d'))
            ->orderBy('dateEvent')
            ->get();
        $types = TypeEvent::all();

        return view('event.eventsPage', compact('events', 'types'));
    }

    public function archivePage()
    {
        $events = Event::whereDate('dateEvent', '<', date('Y-m-d'))
            ->orderByDesc('dateEvent')
            ->get();

        $types = TypeEvent::all();

        return view('event.archivePage', compact('events', 'types'));
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
            'title'=> 'required',
            'status'=> 'required',
            'description'=> 'required',
            'dateEvent'=> 'required',
            'timeEvent'=>'required',
            'endEvent'=>'required',
            'price' => 'required',
            'participation'=> 'required',
            'program'=> 'required',
            'other_info'=> 'required',
            'id_organisation'=> 'required',
            'id_event_type'=> 'required',
            'id_place'=> 'required'
        ]);



        $event = new Event();
        // Заполнение статьи данными из формы
        $event->fill($data);
        // При ошибках сохранения возникнет исключение
        $event->save();

        if ($request->hasFile('image')) {
            $event->addMedia($request->file('image'))
                ->toMediaCollection('cover');
        }

        // Редирект на указанный маршрут
        return redirect()->route('admin.eventsPage');
    }

    //вывод формы
    public function create()
    {
        //Передается в шаблон вновь созданный объект, для вывода формы
        $event = new Event();
        $organizations = Organization::all();
        $typeEvents = TypeEvent::all();
        $places = Place::all();

        return view('event.create', compact('event', 'organizations', 'typeEvents', 'places'));
    }

    public function edit($id){

        $event = Event::findOrFail($id);
        $organizations = Organization::all();
        $typeEvents = TypeEvent::all();
        $places = Place::all();
        return view('event.edit', compact('event', 'organizations', 'typeEvents', 'places'));
    }

    public function update(Request $request, $id){
        $event = Event::findOrFail($id);
        $data = $request->validate([
            // У обновления немного измененная валидация
            // В проверку уникальности добавляется название поля и id текущего объекта
            // Если этого не сделать, Laravel будет ругаться, что имя уже существует
            'title'=> 'required',
            'status'=> 'required',
            'description'=> 'required',
            'dateEvent' => 'required|date',
            'timeEvent' => 'required|date_format:H:i',
            'endEvent'  => 'required|date_format:H:i',
            'price' => 'required',
            'participation'=> 'required',
            'program'=> 'required',
            'other_info'=> 'required',
            'id_organisation'=> 'required',
            'id_event_type'=> 'required',
            'id_place'=> 'required'
        ]);

        $event->fill($data);
        $event->save();

        if ($request->hasFile('image')) {
            $event->addMedia($request->file('image'))
                ->toMediaCollection('cover');
        }

        return redirect()->route('admin.eventsPage');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)//в примере параметр такой, поэтому тоже написала
    {
        $event = Event::with(['media', 'organization', 'place'])->findOrFail($id);
//        $organization = Organization::all();
//        $typeEvent = TypeEvent::all();
//        $place = Place::all();
        return view('event.show', compact('event'));
    }


    // Удаление должно быть доступно только тем, кто может его выполнять
    public function destroy($id){
        // DELETE — идемпотентный метод, поэтому результат операции всегда один и тот же
        $event = Event::findOrFail($id);
        if($event){
            $event->delete();
        }
        return redirect()->route('admin.eventsPage');
    }



}
