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
    <button type="button" class="btnSelectImage" name="imageEvent">Выбрать</button>
</label>

<label>
    Описание
    <textarea name="description"></textarea>
</label>

<label>
    Дата
    <input type="text" name="dateEvent" placeholder="dd.mm.yyyy">
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

