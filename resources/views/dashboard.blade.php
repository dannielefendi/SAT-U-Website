@extends('admin.layouts.userlayout')

@section('user_title')
User Dashboard
@endsection

@section('user_layout')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Dashboard User') }}
</h2>

<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
                {{ session('error') }}
            </div>
        @endif

        @livewire('event-filter', ['viewMode' => 'user'])

    </div>
</div>
@endsection
