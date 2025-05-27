@extends('admin.layouts.layout')
@section('admin_title')
Admin Dashboard
@endsection

@section('admin_layout')

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Create Event') }}
</h2>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h3 class="fw-bold mb-0">Add Event</h3>
                <hr />
                @if (session()->has('error'))
                <div>
                    {{session('error')}}
                </div>

                @endif

                <p><a href="{{ route('admin/event')}}" class="btn btn-primary">Go Back</a></p>

                <form action="{{ route('admin/event/save')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <h5>Title</h5>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <!-- Event Format Dropdown -->
                    <div class="row mb-3">
                        <div class="col">
                            <h5>Event Format</h5>
                            <select name="event_format" class="form-control">
                                <option value="">Select Event Format</option>
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>
                        @error('event_format')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <!-- Audience Scope Dropdown -->
                    <div class="row mb-3">
                        <div class="col">
                            <h5>Audience Scope</h5>
                            <select name="audience_scope" class="form-control">
                                <option value="">Select Audience Scope</option>
                                <option value="National">National</option>
                                <option value="International">International</option>
                            </select>
                        </div>
                        @error('audience_scope')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <!-- Location Dropdown -->
                    <div class="row mb-3">
                        <div class="col">
                            <h5>Location</h5>
                            <select name="region" class="form-control" required>
                                <option value="">Select Location</option>
                                <option value="Kemanggisan">Kemanggisan</option>
                                <option value="Alsut">Alsut</option>
                                <option value="Bandung">Bandung</option>
                            </select>
                        </div>
                        @error('location')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <h5>Registration Start</h5>
                            <input type="date" name="registration_start" class="form-control" placeholder="Registration Start">
                        </div>
                        @error('registration_start')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <h5>Registration End</h5>
                            <input type="date" name="registration_end" class="form-control" placeholder="Registration End">
                        </div>
                        @error('registration_end')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <h5>Participant Limit</h5>
                            <input type="number" name="participant_limit" class="form-control" placeholder="Enter max number of participants" min="1" required>
                        </div>
                        @error('participant_limit')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="d-grid">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection


