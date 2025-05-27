<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventUserController extends Controller
{

    public function index()
    {
        $events = Event::withCount('participants')->orderBy('id', 'desc')->get();
        return view('dashboard', compact('events'));
    }


    public function register($eventId)
    {
        $user = Auth::user();
        $event = Event::withCount('participants')->findOrFail($eventId);

        // Avoid duplicate registrations
        if ($user->events->contains($event)) {
            return back()->with('error', 'You are already registered for this event.');
        }

//        check if the event is full
         if ($event->participant_limit !== null && $event->participants_count >= $event->participant_limit) {
             return back()->with('error', 'Registration is closed. This event is full.');
         }

        // Attach the event to the user without storing username or event name in pivot
        $user->events()->attach($eventId);

        return back()->with('success', 'Successfully registered for the event!');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'title' => [
                'required',
                'unique:events,title',
                'regex:/^[A-Za-z\s\-]+$/'
            ],
            'registration_start' => 'required|date',
            'registration_end' => 'required|date|after_or_equal:registration_start',
        ]);

        $event = Event::create($validation);

        if ($event) {
            return redirect()->route('admin.event')->with('success', 'Event created successfully!');
        } else {
            return redirect()->route('admin.event.create')->with('error', 'Something went wrong while creating the event.');
        }
    }

    public function history()
    {
        $user = Auth::user();

        // Get events the user has registered for, ordered by registration date
        $events = $user->events()->orderBy('event_user.created_at', 'desc')->get();

        return view('history', compact('events'));
    }


}
