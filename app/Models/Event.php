<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    protected $fillable = ['imageEvent','title', 'status', 'description','dateEvent','timeEvent', 'endEvent'];

    public function getImage()
    {
        return Storage::disk('local')->url('images/Event1.png');
    }
}
