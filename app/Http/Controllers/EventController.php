<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index ()
    {
        $event = Event::withCount('participants')->orderBy('id', 'desc')->get();
        $total = Event::count();
        return view('admin.event.home', compact('event', 'total'));
    }


    public function create()
    {

        return view('admin.event.create');
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

            'event_format' => 'required|in:Online,Offline,Hybrid',
            'audience_scope' => 'required|in:National,International',
            'region' => 'required|in:Kemanggisan,Alsut,Bandung',
            'participant_limit' => 'required|integer|min:1',
        ]);
        $data = Event::create($validation);
        if ($data) {
            session()->flash('success', 'Product Add Successfully');
            return redirect(route('admin/event'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.event/create'));
        }
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.update', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validation = $request->validate([
            'title' => 'required|regex:/^[A-Za-z\s\-]+$/|unique:events,title,' . $event->id,
            'registration_start' => 'required|date',
            'registration_end' => 'required|date|after_or_equal:registration_start',
            'event_format' => 'required|in:Online,Offline,Hybrid',
            'audience_scope' => 'required|in:National,International',
            'region' => 'required|in:Kemanggisan,Alsut,Bandung',
            'participant_limit' => 'required|integer|min:1',
        ]);

        $event->update($validation);

        if ($event) {
            session()->flash('success', 'Event updated successfully');
            return redirect(route('admin/event'));
        } else {
            session()->flash('error', 'Some problem occurred');
            return redirect()->back();
        }
    }


    public function delete($id)
    {
        $event = Event::findOrFail($id)->delete();
        if ($event) {
            session()->flash('success', 'Product Deleted Successfully');
            return redirect(route('admin/event'));
        } else {
            session()->flash('error', 'Product Not Delete successfully');
            return redirect(route('admin/event'));
        }
    }




}
