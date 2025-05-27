<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'title',
        'registration_start',
        'registration_end',
        'event_format',
        'audience_scope',
        'region',
        'participant_limit',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user')->withTimestamps();
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_user')->withTimestamps();
    }

}
