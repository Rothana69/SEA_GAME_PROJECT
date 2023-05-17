<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Stadiums;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(['message' => 'booking successfully', 'data' => Ticket::all()], 200);
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
        //
        $validator = validator::make(
            $request->all(),
            [
                'zone' => 'required',
                'event_id' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json([$validator->errors()], 400);
        } else {
            $stadium = $this->getStadium(intval($request['event_id']));
            $ticket = $this->getNumberZones($request['zone'], intval($request['event_id']));
            if ($request['zone'] === 'A' and $ticket >= $stadium['zone_A']) {
                return response()->json(['message' => 'Ticket is full in zone A'], 201);
            } elseif ($request['zone'] === 'B' and $ticket >= $stadium['zone_B']) {
                return response()->json(['message' => 'Ticket is full in zone B'], 201);
            } else {
                $ticket = new Ticket;
                $ticket->price = 0;
                $ticket->zone = $request['zone'];
                $ticket->event_id = $request['event_id'];
                $ticket->save();
                return response()->json(['message' => 'Ticket has been buy successfully', 'data' => $ticket], 200);
            }
        }
        // $ticket = Ticket::create($validator->validated());

    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
    public function getNumberZones(string $zone, string $event_id)
    {
        $numberZone = Ticket::select('tickets.*')
            ->join('events', 'events.id', '=', 'tickets.event_id')
            ->where('tickets.zone', '=', $zone)
            ->where('tickets.event_id', '=', $event_id)
            ->count();
        return $numberZone;
    }
    public function getStadium(int $event_id)
    {
        $stadium = Stadiums::select('stadiums.*')
            ->join('events', 'events.stadium_id', '=', 'stadiums.id')
            ->where('events.id', '=', $event_id)
            ->get()->first();
        return $stadium;
    }
}
