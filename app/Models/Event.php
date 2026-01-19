<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class  Event extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $casts = [
        'date_event' => 'date',
    ];

    protected $fillable = ['title', 'status', 'description', 'dateEvent', 'timeEvent', 'endEvent', 'price', 'participation', 'program', 'other_info', 'id_organisation', 'id_event_type', 'id_place'];

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')
            ->withTimestamps();
    }

    public function organization(){
        return $this->belongsTo(Organization::class, 'id_organisation');
    }

    public function typeEvent(){
        return $this->belongsTo(TypeEvent::class, 'id_event_type');
    }

    public function place(){
        return $this->belongsTo(Place::class, 'id_place');
    }

    public function getCover()
    {
        return $this->getMedia('cover')->count()
            ? $this->getFirstMediaUrl('cover')
            : asset('storage/images/Event1.png');
//            : Storage::disk('local')->url('images/Event1.png');

    }
}
