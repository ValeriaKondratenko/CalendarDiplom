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
    Название места проведения
    <input type="text" name="name" required >
</label>

<label>
    Адрес
    <textarea name="address" required></textarea>
</label>

<label>
    Контакты
    <input name="contact_number" type="text" required>
</label>

<label>
    Регион
    <select name="region_id" required>
        @foreach($regions as $region)
            <option value="{{$region->id}}">{{$region->name}}</option>
        @endforeach
    </select>
</label>



