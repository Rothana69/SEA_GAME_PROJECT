<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Event;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = [
        'sport_name'
    ];
    public function event(): HasOne
    {
        return $this->hasOne(Event::class);
    }
}
