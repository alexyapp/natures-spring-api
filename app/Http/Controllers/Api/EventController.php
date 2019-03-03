<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use App\Http\Resources\Event as EventResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(10);

        return EventResource::collection($events);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EventRequest  $request
     * @return \App\Http\Resources\Event
     */
    public function store(EventRequest $request)
    {
        $event = Event::create(
            array_merge(
                $request->except('name'),
                [
                    'name' => ucwords($request->name),
                    'user_id' => $request->user()->id,
                    'cover_image' => $request->cover_image ?? null
                ]
            )
        );

        return new EventResource($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \App\Http\Resources\Event
     */
    public function show(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \App\Http\Resources\Event
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->update(
            $request->except('name'),
            array_merge(
                [
                    'name' => ucwords($request->name)
                ]
            )
        );

        return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \App\Http\Resources\Event
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return new EventResource($event);
    }
}
