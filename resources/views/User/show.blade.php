@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
<link rel="stylesheet" href="{{ asset('css/Services.css') }}">
<link rel="stylesheet" href="{{ asset('css/Form.css') }}">
<link rel="stylesheet" href="{{ asset('css/Pages.css') }}">

<div class="userProfileContainer">
    <ul>
        <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="" id="userImage">
        <li id="userName">{{ $user->name }}</li>
        <li id="address">{{ $user->address }}</li>
        <li id="contactNumber">{{ $user->contact_number }}</li>
        <li id="emailAddress">{{ $user->email }}</li>
        <a href="{{ route('user.edit', $user->id) }}"><button id="btn-update">Update</button></a>
    </ul>
</div>

@endsection