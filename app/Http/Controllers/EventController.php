<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sport;
use App\Models\Stadiums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Matches;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(['message' => 'Request successful', 'data' => Sport::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator::make(
            $request->all(),
            [
                'event_name' => 'required|max:20',
                'date' => 'required',
                'sport_id' => 'required',
                'stadium_id' => 'required'
            ]
        );
        if ($validator->fails()) {
            return $validator->errors();
        }
        $stadium = Stadiums::find($request["stadium_id"]);
        $numberOfTicket = $stadium['zone_A'] + $stadium['zone_B'];
        $request['available'] = $numberOfTicket;
        $event = new Event;
        $event->event_name = $request['event_name'];
        $event->date = $request['date'];
        $event->available = $request['available'];
        $event->sport_id = $request['sport_id'];
        $event->stadium_id = $request['stadium_id'];
        $event->save();
        return response()->json(['message' => 'create event successfully', 'data' => $event], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
        //
        $event = Event::where('event_name', 'LIKE', "%{$name}%")->get();
        return response()->json(['message' => 'search event success', 'data' => $event], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        //
        $validator = validator::make(
            $request->all(),
            [
                'event_name' => 'required|max:20',
                'date' => 'required',
                'sport_id' => 'required',
                'stadium_id' => 'required'
            ]
        );
        if ($validator->fails()) {
            return $validator->errors();
        }
        $stadium = Stadiums::find($request["stadium_id"]);
        $numberOfTicket = $stadium['zone_A'] + $stadium['zone_B'];
        $request['available'] = $numberOfTicket;
        $event = Event::find($id);
        if ($event == null) {
            return response()->json(['message' => 'Request not found', 'data' => $event], 401);
        }
        $event->event_name = $request['event_name'];
        $event->date = $request['date'];
        $event->available = $request['available'];
        $event->sport_id = $request['sport_id'];
        $event->stadium_id = $request['stadium_id'];
        $event->save();
        return response()->json(['message' => 'edit event successfully', 'data' => $event], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $event)
    {
        //
        $event = Event::find($event);
        $event->delete();
        return response()->json(['message' => 'Event has been deleted'], 200);
    }
    public function getDetails(int $id)
    {
        $event = Event::find($id);
        $event->Matches;
        if ($event == null) {
            return response()->json(['message' => 'Request not found', 'data' => $event], 401);
        }
        return response()->json(['message' => 'Request successful', 'data' => $event], 200);
    }
}
