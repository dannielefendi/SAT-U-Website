@extends('admin.layouts.userlayout')
@section('user_title')
User History
@endsection

@section('user_layout')

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('My Event History') }}
</h2>


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

            </div>
        </div>
    @empty
        <div class="col-12 text-center text-gray-500 dark:text-gray-300">No events found.</div>
    @endforelse
</div>

{{-- <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <div class="space-y-6">
                @forelse ($events as $event)
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 mb-4">
                        <div>
                            <h2 class="font-bold text-lg text-black dark:text-white mb-1">
                                <p class="text-gray-800 dark:text-gray-300">
                                    <strong>{{ $event->region }}</strong>
                                </p>
                            </h2>
                            <h2 class="text-md text-gray-800 dark:text-gray-300 font-semibold mb-2">
                                <strong>{{ $event->title }}</strong>
                            </h2>

                            <ul class="text-sm text-gray-700 dark:text-gray-400 space-y-2">
                                <li class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">Registration Start:</span>
                                    {{ $event->registration_start }}
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">Registration End:</span>
                                    {{ $event->registration_end }}
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-base">Audience Scope:</span>
                                    {{ $event->audience_scope }}
                                </li>
                            </ul>
                        </div>

                        <button type="submit" class="bg-white border border-gray-400 px-4 py-1 rounded-full text-sm hover:bg-gray-100 mt-4">
                            {{ $event->event_format }}
                        </button>
                    </div>
                @empty
                    <div class="text-center text-gray-600 dark:text-gray-300">
                        You have not registered for any events yet.
                    </div>
                @endforelse
            </div>



        </div>
    </div>
</div> --}}

@endsection
