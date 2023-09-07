@extends('layouts.header')

@section('content')
<h1 class="title">Users</h1>
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
            </tr>
            @foreach ($usersItems as $key => $usersItem)
            <tr>
                <td><img src="{{ asset($usersItem->profile_pic) }}" alt="" id="userImage"></td>
                <td>{{ $usersItem->name }}</td>
                <td>{{ $usersItem->address }}</td>
                <td>{{ $usersItem->contact_number }}</td>
                <td>{{ $usersItem->email }}</td>
                <td>{{ $usersItem->role->name }}</td>
                <td><a href="./FORMS/Userdatatableview.html">View</a></td>
            </tr>
            @endforeach
    </table>
    
    @endsection