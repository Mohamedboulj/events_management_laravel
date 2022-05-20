<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class Form extends Controller
{
    public function index(){
        return view('/form');
    }
    public function all(){
        $events = Event::all();
        return view('/events',["events"=>$events]);
    }
    public function allevents(){
        $events = Event::all();
        return view('/eventslist',["events"=>$events]);
    }


    public function store(Request $request){

            $validated = $request->validate([
            'event_name' => 'required',
            'event_place' => 'required',
            'event_date' => 'required',
            'event_picture' => 'required|mimes:png,jpg',
        ]);

            $path = $request->file('event_picture')->store('public/img','public');
            $event = new Event();
            $event->event_name = $request->event_name;
            $event->event_description = $request->event_description;
            $event->event_place = $request->event_place;
            $event->event_date = $request->event_date;
            $event->event_picture = 'storage/'.$path;
            $event->save();
            return redirect('/')->with('status', 'event added!');

    }

}
