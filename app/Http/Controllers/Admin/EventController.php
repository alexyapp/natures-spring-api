<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use DataTables;
use App\Models\Event;
class EventController extends Controller
{
    /**
     * Display the datatables of the resource.
     * 
     * @return DataTables
     */
    public function datatable()
    {
        $events = Event::all();
        return DataTables::of($events)
                ->editColumn('user_id', function (Event $event) {
                    return $event->organizer->name;
                })
                ->editColumn('info', function (Event $event) {
                    return Str::limit(strip_tags($event->info), 20);
                })
                ->editColumn('start_date', function (Event $event) {
                    return $event->start_date->format('M d, Y h:i A');
                })
                ->editColumn('end_date', function (Event $event) {
                    return $event->end_date->format('M d, Y h:i A');
                })
                ->editColumn('created_at', function (Event $event) {
                    return $event->created_at->format('M d, Y h:i A');
                })
                ->editColumn('updated_at', function (Event $event) {
                    return $event->updated_at->format('M d, Y h:i A');
                })
                ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastUpdated = Event::latest('updated_at')->firstOrFail()->updated_at->format('F d, Y g:i A');
        return view('admin.events.index', compact('lastUpdated'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
