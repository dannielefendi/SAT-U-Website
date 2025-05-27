<div>
    <!-- Filters and Sorting -->
    <div class="d-flex mb-4 flex-wrap align-items-end" style="gap: 20px;">
        <!-- Search -->
        <div style="flex: 1 1 300px;">
            <label for="titleSearch" class="form-label">Search by Title</label>
            <input type="text" id="titleSearch" class="form-control"
                wire:model.live="title" placeholder="Search by title...">
        </div>

        <!-- Region Filter -->
        <div style="flex: 0 0 180px;">
            <label for="region" class="form-label"><b class="text-secondary">Region</b>:</label>
            <select id="region" class="custom-select form-control" wire:model.live="region">
                <option value="">No Selected</option>
                <option value="Kemanggisan">Kemanggisan</option>
                <option value="Alsut">Alsut</option>
                <option value="Bandung">Bandung</option>
            </select>
        </div>

        <!-- Event Format Filter -->
        <div style="flex: 0 0 180px;">
            <label for="event_format" class="form-label"><b class="text-secondary">Event Format</b>:</label>
            <select id="event_format" class="custom-select form-control" wire:model.live="event_format">
                <option value="">No Selected</option>
                <option value="Online">Online</option>
                <option value="Offline">Offline</option>
                <option value="Hybrid">Hybrid</option>
            </select>
        </div>

        <!-- Scope Filter -->
        <div style="flex: 0 0 180px;">
            <label for="audience_scope" class="form-label"><b class="text-secondary">Scope</b>:</label>
            <select id="audience_scope" class="custom-select form-control" wire:model.live="audience_scope">
                <option value="">No Selected</option>
                <option value="International">International</option>
                <option value="National">National</option>
            </select>
        </div>
    </div>

    {{-- DIFFERENT RENDERING FOR USER VS ADMIN --}}
    @if ($viewMode === 'admin')
        <div class="p-1 text-gray-900 dark:text-gray-100">

            <div class="d-flex align-items-center justify-content-between mb-3">
                <h1 class="mb-0">List Event</h1>
                <a href="{{ route('admin/event/create') }}" class="btn btn-primary">
                    Add Event
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Format</th>
                            <th>Scope</th>
                            <th>Location</th>
                            <th>Regis. Start</th>
                            <th>Regis. End</th>
                            <th>Participants</th>
                            <th>Max Participants</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $event->title }}</td>
                                <td>{{ $event->event_format }}</td>
                                <td>{{ $event->audience_scope }}</td>
                                <td>{{ $event->region }}</td>
                                <td>{{ $event->registration_start }}</td>
                                <td>{{ $event->registration_end }}</td>
                                <td><span class="align-middle">{{ $event->participants_count }}</span></td>
                                <td><span class="align-middle">{{ $event->participant_limit }}</span></td>
                                <td>
                                    <a href="{{ route('admin/event/edit', ['id'=>$event->id]) }}" class="btn btn-sm btn-info me-1 text-white">
                                        <i class="align-middle" data-feather="edit-2"></i> Edit
                                    </a>
                                    <a href="{{ route('admin/event/delete', ['id'=>$event->id]) }}" class="btn btn-sm btn-danger text-white">
                                        <i class="align-middle" data-feather="trash-2"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted py-4">No events found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    @else
        {{-- USER CARD VIEW --}}
        <div class="row mt-4">
            @forelse ($events as $event)
                <div class="col-md-6 mb-4">
                    <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-md pt-2 pb-5 p-4 border border-gray-300 dark:border-gray-700 h-100">
                        <h2 class="font-bold text-lg text-black dark:text-white mt-4 mb-1">
                            <p class="text-gray-800 dark:text-gray-300">
                                <strong>{{ $event->audience_scope }}</strong>
                            </p>
                        </h2>

                        <!-- Title and Format Badge -->
                        <div class="d-flex justify-content-between align-items-center mt-1 mb-3">
                            <h1 style="font-size: 22px; " class="text-gray-900 dark:text-white m-0">{{ $event->title }}</h1>

                            @php
                                $badgeStyles = [
                                    'Online' => 'background-color: #e1f0ff; color: #0969da;',
                                    'Offline' => 'background-color: #dafbe1; color: #1a7f37;',
                                    'Hybrid' => 'background-color: #fff8c5; color: #9a6700;',
                                    'default' => 'background-color: #f6f8fa; color: #57606a;'
                                ];

                                $style = $badgeStyles[$event->event_format] ?? $badgeStyles['default'];
                            @endphp

                            <span class="px-3 py-1 rounded-pill text-xs font-semibold" style="{{ $style }}">
                                {{ $event->event_format }}
                            </span>
                        </div>

                        <!-- Main Content -->
                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Region:</strong> {{ $event->region }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4"><strong>Registration Start:</strong> {{ $event->registration_start }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4"><strong>Registration End:</strong> {{ $event->registration_end }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4"><strong>Participants: </strong>{{ $event->participant_limit }}</p>

                        @php
                            $today = \Carbon\Carbon::now();
                            $start = \Carbon\Carbon::parse($event->registration_start);
                            $end = \Carbon\Carbon::parse($event->registration_end);

                            $isFull = $event->participant_limit !== null && $event->participants_count >= $event->participant_limit;
                            $isNotYetOpen = $today->lt($start);
                            $isClosed = $today->gt($end);
                        @endphp

                        @if ($isNotYetOpen)
                            <div class="mt-1 d-flex justify-content-between align-items-center">
                                <span class="text-warning fw-bold px-3 py-1 rounded" style="background-color: #fff3cd; border: 1px solid #ffeeba;">
                                    Not Yet Open
                                </span>
                            </div>
                        @elseif ($isClosed)
                            <div class="mt-1 d-flex justify-content-between align-items-center">
                                <span class="text-secondary fw-bold px-3 py-1 rounded" style="background-color: #e2e3e5; border: 1px solid #d6d8db;">
                                    Closed
                                </span>
                            </div>
                        @elseif ($isFull)
                            <div class="mt-1 d-flex justify-content-between align-items-center">
                                <span class="text-danger fw-bold px-3 py-1 rounded" style="background-color: #f8d7da; border: 1px solid #f5c6cb;">
                                    Full
                                </span>
                            </div>
                        @else
                            <form action="{{ route('event.register', ['id' => $event->id]) }}" method="POST" class="mt-1 d-flex justify-content-between align-items-center">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="border-radius: 5px;">
                                    Register
                                </button>
                            </form>
                        @endif

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-gray-500 dark:text-gray-300">No events found.</div>
            @endforelse
        </div>
    @endif

    <div class="block mt-1">
        {{ $events->links('livewire::bootstrap') }}
    </div>
</div>
