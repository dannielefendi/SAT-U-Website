@extends('admin.layouts.layout')
@section('admin_title')
Admin Dashboard
@endsection

@section('admin_layout')

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Dashboard Admin') }}
    <hr>
    {{ __("You're logged in!") }}
    <h1> </h1>
    <p><a href="event" class="btn" style="background-color: #5e69ff; padding: 8px 15px; color: white;">Event</a></p>
</h2>



@endsection
