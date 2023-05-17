<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Event;

class Stadiums extends Model
{
    use HasFactory;
    protected $fillable = [
        'stadium_name',
        'zone_A',
        'zone_B'
    ];
    public function event(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
