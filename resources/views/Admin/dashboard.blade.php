@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">
    <h1 class="title">Dashboard</h1>
    <div class="dashboardContainer">
        <ul >
            <a href="adminUsers.html"><li><h1>Users</h1><p>{{ $userCount }}</p></li></a>
            <li><h1>Incoming Events</h1><p>0</p></li>
            <li><h1>New Bookings</h1><p>0</p></li>
            <li><h1>Reservation</h1><p>0</p></li>
            <li><h1>Ongoing Events</h1><p>0</p></li>
            <li><h1>Past Events</h1><p>0</p></li>
        
        </ul>
    </div>
    
    @endsection