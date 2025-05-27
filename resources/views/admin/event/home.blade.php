@extends('admin.layouts.layout')
@section('admin_title')
Admin Dashboard
@endsection

@section('admin_layout')

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Admin Dashboard') }}
</h2>

<div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="start">
            {{ Session::get('success') }}
        </div>
    @endif
</div>


@livewire('event-filter', ['viewMode' => 'admin'])


@endsection

