<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Event;

class PageController extends Controller
{
    /**
     * Show home.
     */
    public function home()
    {
        return view('website.home');
    }

    /**
     * Show all careers.
     */
    public function careers()
    {
        return view('website.careers.index');
    }

    /**
     * Show a single career.
     */
    public function career(Job $career)
    {
        return view('website.careers.career', compact('career'));
    }

    /**
     * Show all events.
     */
    public function events()
    {
        return view('website.events.index');
    }

    /**
     * Show a single event.
     * 
     * @param \App\Models\Event $event
     */
    public function event(Event $event)
    {
        return view('website.events.event', compact('event'));
    }
}
