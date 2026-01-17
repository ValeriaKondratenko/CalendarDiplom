<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function events(){
        return $this->hasMany(Event::class);
    }



    protected $fillable = [ 'name', 'description', 'contact', 'address'];
}
