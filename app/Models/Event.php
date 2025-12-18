<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'week',
        'day_in_week',
        'weekday',
        'title',
        'time_range',
        'artist',
        'background_class',
        'background_color',
        'has_background_image',
        'description',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'has_background_image' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function scopeForWeek($query, $week)
    {
        return $query->where('week', $week);
    }

    public function scopeForWeekday($query, $weekday)
    {
        return $query->where('weekday', $weekday);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')
                     ->orderBy('day_in_week');
    }
}
