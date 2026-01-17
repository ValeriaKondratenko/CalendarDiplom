@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<label>
    Название мероприятия
    <input type="text" name="title" >
</label>

<label>
    Изображение мероприятия
    <input type="file" name="image">
</label>

<label>
    Описание
    <textarea name="description"></textarea>
</label>

<label>
    Дата
    <input type="date" name="dateEvent" placeholder="dd.mm.yyyy">
</label>

<div class="timeRow">
    <label>
        Начало мероприятия
        <input type="text" name="timeEvent" placeholder="--:--">
    </label>

    <label>
        Конец мероприятия
        <input type="text" name="endEvent" placeholder="--:--">
    </label>
</div>

<label>
    Статус
    <input name="status" type="text">
</label>

<label>
    Цена
    <input type="text" name="price" >
</label>

<label>
    Участие
    <textarea name="participation"></textarea>
</label>
<label>
    Программа
    <textarea name="program"></textarea>
</label>
<label>
    Другая информация
    <textarea name="other_info"></textarea>
</label>
<label>
    Организация
    <select name="id_organisation" required>
        @foreach($organizations as $organization)
            <option value="{{$organization->id}}">{{$organization->name}}</option>
        @endforeach
    </select>
</label>
<label>
    Тип мероприятия
    <select name="id_event_type" required>
        @foreach($typeEvents as $typeEvent)
            <option value="{{$typeEvent->id}}">{{$typeEvent->name}}</option>
        @endforeach
    </select>
</label>
<label>
    Место проведения
    <select name="id_place" required>
        @foreach($places as $place)
            <option value="{{$place->id}}">{{$place->name}}</option>
        @endforeach
    </select>
</label>

