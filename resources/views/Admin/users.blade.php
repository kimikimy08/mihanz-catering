@extends('layouts.header')

@section('content')
<div class="container">
    <h1 class="title">Users</h1>
    
<!--     <div class="add-button"> 
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add</a> 
        </div> -->

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
                <a href="{{ route('users.show', $usersItem->id) }}" class="btn btn-info">View</a> <!-- Show button -->
                <a href="{{ route('users.edit', $usersItem->id) }}" class="btn btn-warning">Edit</a> <!-- Edit button -->
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
