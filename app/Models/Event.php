<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\InteractsWithMedia;

class   Event extends Model
{
    use InteractsWithMedia;

    protected $fillable = ['imageEvent', 'title', 'status', 'description', 'dateEvent', 'timeEvent', 'endEvent'];


    public function getCover()
    {
        return $this->getMedia('cover')->count()
            ? $this->getFirstMediaUrl('cover')
            : Storage::disk('local')->url('images/Event1.png');
    }
}
