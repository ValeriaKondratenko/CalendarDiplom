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
    Название организации
    <input type="text" name="name" >
</label>

<label>
    Описание
    <textarea name="description"></textarea>
</label>

<label>
    Контакты
    <input name="contact" type="text">
</label>

<label>
    Адрес
    <input type="text" name="address" >
</label>



