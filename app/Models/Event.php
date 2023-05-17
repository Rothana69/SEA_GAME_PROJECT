<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Stadiums;
use App\Models\Sport;
use App\Models\Matches;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_name',
        'date',
        'sport_id',
        'stadium_id'
    ];
    public function stadiums(): BelongsTo
    {
        return $this->belongsTo(Stadiums::class);
    }
    public function sport(): HasOne
    {
        return $this->hasOne(Sport::class);
    }
    public function matches(): HasMany
    {
        return $this->hasMany(Matches::class);
    }
    public function ticket(): HasMany {
        return $this->hasMany(Ticket::class);
    }
}
