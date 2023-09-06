@extends('layouts.app')

@section('content')

<div class="userEditProfileContainer">
    <h1>Edit Your Profile</h1>

    <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <div class="form-group">
            <label for="address">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ $user->address }}">
        </div>

        <div class="form-group">
            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" value="{{ $user->contact_number }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="profile_pic">Profile Picture:</label>
            <input type="file" id="profile_pic" name="profile_pic" >
        </div>

        <div class="form-group">
            <button type="submit" id="btn-update">Update Profile</button>
        </div>
    </form>
</div>

@endsection