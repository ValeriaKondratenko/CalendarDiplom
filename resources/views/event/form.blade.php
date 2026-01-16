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
    <input type="text"  >
</label>

<label>
    Изображение мероприятия
    <button type="button" class="btnSelectImage">Выбрать</button>
</label>

<label>
    Описание
    <textarea></textarea>
</label>

<label>
    Дата
    <input type="text" placeholder="dd.mm.yyyy">
</label>

<div class="timeRow">
    <label>
        Начало мероприятия
        <input type="text" placeholder="--:--">
    </label>

    <label>
        Конец мероприятия
        <input type="text" placeholder="--:--">
    </label>
</div>

<label>
    Статус
    <input type="text">
</label>

