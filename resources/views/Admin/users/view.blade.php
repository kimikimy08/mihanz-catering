@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="container"> 
    <main>
        <img src="{{ asset($user->profile_pic) }}" alt="User Profile">
        <table class="user-table">
            <tr>
                <td>Name:</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>{{ $user->address }}</td>
            </tr>
            <tr>
                <td>Contact No.:</td>
                <td>{{ $user->contact_number }}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td><button class="user-btn"><a href="{{ route('admin.users.edit', $user->id) }}">Edit</a></button></td>
                <td></td>
            </tr>
        </table>
    </main>
</div>
@endsection
