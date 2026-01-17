<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //такой же метод для обозначения связи, говорит о том что у одного региона может быть много мест
    public function places(){
        return $this->hasMany(Place::class);
    }

    protected $fillable = ['name'];
    //
}
