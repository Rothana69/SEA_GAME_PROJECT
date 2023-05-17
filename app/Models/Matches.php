<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matches extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_one',
        'country_two',
        'time',
        'event_id'
    ];
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
