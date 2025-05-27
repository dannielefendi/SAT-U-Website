@extends('admin.layouts.layout')
@section('admin_title')
Admin Dashboard
@endsection

@section('admin_layout')

<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Edit Event') }}
</h2>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="mb-0">Edit Event</h1>
                <hr />
                <form action="{{ route('admin/event/update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Event Name</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $event->title }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Registration Start --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Registration Start</label>
                            <input type="date" name="registration_start" class="form-control" value="{{ $event->registration_start }}">
                            @error('registration_start')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Registration End --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Registration End</label>
                            <input type="date" name="registration_end" class="form-control" value="{{ $event->registration_end }}">
                            @error('registration_end')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Event Format --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Event Format</label>
                            <select name="event_format" class="form-control">
                                <option value="">Select Format</option>
                                <option value="Online" {{ $event->event_format == 'Online' ? 'selected' : '' }}>Online</option>
                                <option value="Offline" {{ $event->event_format == 'Offline' ? 'selected' : '' }}>Offline</option>
                                <option value="Hybrid" {{ $event->event_format == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                            @error('event_format')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Audience Scope --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Audience Scope</label>
                            <select name="audience_scope" class="form-control">
                                <option value="">Select Audience</option>
                                <option value="National" {{ $event->audience_scope == 'National' ? 'selected' : '' }}>National</option>
                                <option value="International" {{ $event->audience_scope == 'International' ? 'selected' : '' }}>International</option>
                            </select>
                            @error('audience_scope')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Region --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Region</label>
                            <select name="region" class="form-control">
                                <option value="">Select Region</option>
                                <option value="Kemanggisan" {{ $event->region == 'Kemanggisan' ? 'selected' : '' }}>Kemanggisan</option>
                                <option value="Alsut" {{ $event->region == 'Alsut' ? 'selected' : '' }}>Alsut</option>
                                <option value="Bandung" {{ $event->region == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                            </select>
                            @error('region')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Participant Limit --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Participant Limit</label>
                            <input type="number" name="participant_limit" class="form-control" value="{{ $event->participant_limit }}" min="1" required>
                            @error('participant_limit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    {{-- Submit Button --}}
                    <div class="row">
                        <div class="d-grid">
                            <button class="btn btn-warning">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
