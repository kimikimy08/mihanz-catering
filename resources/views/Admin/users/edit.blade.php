@extends('layouts.header')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">


<div class="container"> 
    <main>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="user-table">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" value="{{ $user->name }}"></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" value="{{ $user->address }}"></td>
                </tr>
                <tr>
                    <td>Contact No.:</td>
                    <td><input type="tel" name="contact_number" value="{{ $user->contact_number }}"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" value="{{ $user->email }}"></td>
                </tr>
                <tr>
                    <td>Profile Picture:</td>
                    <td>
                        @if ($user->profile_pic)
                            <img src="{{ asset($user->profile_pic) }}" alt="Current Profile Picture" style="max-width: 100px;">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><button class="user-btn" type="submit">Save</button></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </main>
</div>
@endsection
