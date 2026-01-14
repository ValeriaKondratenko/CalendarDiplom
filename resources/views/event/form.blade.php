@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label for="imageEvent">Картинка:</label>
    <input type="text" name="imageEvent"  id="imageEvent">
</div>
<div>
    <label for="title">Имя:</label>
    <input type="text" name="title" id="title">
</div>
<div>
    <label for="status">Статус:</label>
    <input type="text" name="status" id="status">
</div>
<div>
    <label for="description">Описание:</label>
    <textarea name="description" id="description"> </textarea>
</div>
<div>
    <label for="dateEvent">Дата:</label>
    <input type="date" name="dateEvent" id="dateEvent">
</div>
<div>
    <label for="timeEvent">Начало:</label>
    <input type="time" name="timeEvent" id="timeEvent">
</div>
<div>
    <label for="endEvent">Конец:</label>
    <input type="time" name="endEvent" id="endEvent">
</div>

