<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $artists = Artist::orderBy('id')->get();

        // Get ALL events grouped by week and weekday
        $events = Event::orderBy('week')
                      ->orderBy('day_in_week')
                      ->get()
                      ->groupBy(['week', 'weekday']);

        // Or if you want to pass all events as JSON for JavaScript
        $eventsJson = Event::orderBy('week')
                          ->orderBy('day_in_week')
                          ->get();

        return view('home', compact('artists', 'events', 'eventsJson'));
    }
}
