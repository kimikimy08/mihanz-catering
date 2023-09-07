@extends('layouts.header')

@section('content')
<h1 class="title">Booking</h1>
    <table>
        <tr>
            <th>R-ID</th>
            <th>Name</th>
            <th>Event</th>
            <th>Package</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th></th>
        </tr>
        <tr>
            <td>mhzc112</td>
            <td>John Cedric Iglesias</td>
            <td>birthday</td>
            <td>customize</td>
            <td>09-23-23</td>
            <td>12pm - 3pm</td>
            <td></td>
            <td><a href="./FORMS/Bookingdatatable.html">View</a></td>
        </tr>
</table>
    
    @endsection