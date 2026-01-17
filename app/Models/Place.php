<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //просто описывается связь между таблицами, говорит о том что каждое место принадлежит одному региону
    //для получения доступа к таблице регинов по айдишнику
    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function events(){
        return $this->belongsTo(Event::class);
    }

    protected $fillable = ['name', 'address' ,'contact_number', 'region_id'];
}
