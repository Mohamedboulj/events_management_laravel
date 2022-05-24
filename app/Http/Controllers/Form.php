<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Form extends Controller
{
    public function index(){
        return view('dashboard.form');
    }
    public function all(){
        $events = Event::all();
        return view('guest.events',["events"=>$events]);
    }
    public function allevents(){
        $events = Event::all();
        return view('dashboard.eventslist',["events"=>$events]);
    }


    public function store(Request $request){

            $validated = $request->validate([
            'event_name' => 'required',
            'event_place' => 'required',
            'event_date' => 'required',
            'event_picture' => 'mimes:png,jpg',
        ]);
            if($request->hasFile('event_picture')){
                $path = $request->file('event_picture')->store('public/img','public');
            }
            $path='';
            $event = new Event();
            $event->event_name = $request->event_name;
            $event->event_description = $request->event_description;
            $event->event_place = $request->event_place;
            $event->event_date = $request->event_date;
            $event->event_picture = 'storage/'.$path;
            $event->save();
            return redirect('/')->with('status', 'event added!');

    }
    public function delete($id){
        //check if event id exists in db
        $event = Event::find($id);

        if(!$event)
        return redirect()->back()->with(['error'=>'event don\'t exist']);
        $event->delete();
        return redirect('/')->with(['success'=>'Event deleted with success']);

    }
    public function edit($id){
        $event = Event::find($id);

        if(!$event)
        return redirect()->back();
        $event= Event::select('id','event_name','event_date','event_place','event_picture','event_description')->find($id);
        return view(view:'dashboard.formedit',data:compact(var_name:'event'));



    }
    public function update(Request $request,$id){
        //check if event exists
        $event= Event::find($id);
        if(!$event)
        return redirect()->back();
        $event->updated($request->all());
        return redirect()->back();
        // $event ->update([
        //     event_name=>$request->event_name,
        //     event_description=>$event->event_description,
        //     event_place=>$event->event_place,
        //     event_date=>$request->event_date,
        //     event_picture=>$request->event_picture,

        // ]);

    }

}
