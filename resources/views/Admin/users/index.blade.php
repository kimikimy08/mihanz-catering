@extends('layouts.header')



@section('content')

<link rel="stylesheet" href="{{ asset('css/admin/user.css') }}">

<div class="container">
    <h1 class="title">Users</h1>
    

    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact No.</th>
            <th>Email</th>
            <th>Role</th>
            <th></th>
        </tr>
        @foreach ($usersItems as $key => $usersItem)
        <tr>
            <td><img src="{{ asset($usersItem->profile_pic) }}" alt="" id="userImage"></td>
            <td>{{ $usersItem->name }}</td>
            <td>{{ $usersItem->address }}</td>
            <td>{{ $usersItem->contact_number }}</td>
            <td>{{ $usersItem->email }}</td>
            <td>{{ $usersItem->role->name }}</td>
            <td>
            <a href="{{ route('admin.users.view', $usersItem->id) }}" class="btn btn-info">View</a> <!-- Show button -->
                <a href="{{ route('admin.users.edit', $usersItem->id) }}" class="btn btn-warning">Edit</a> <!-- Edit button -->
                
                <!-- Delete button and form -->
                <form action="{{ route('users.destroy', $usersItem->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
