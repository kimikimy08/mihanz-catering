@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">
<h1 class="title">Services</h1>
 <div class="add-button"> 
 <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add</a> 
        </div> 
        <table>
            <tr>
                <th>Image</th>
                <th>Service Category</th>
                <th></th>
            </tr>
            @foreach ($services as $key => $service)
            <tr>
                <td><img src="{{ asset($service->services_image) }}" alt="" id="userImage"></td>
                <td>{{ $service->services_category}}</td>
                <td>
                <a href="{{ route('admin.services.view', ['id' => $service->id]) }}" class="btn btn-info">View</a>
            <a href="{{ route('admin.services.edit', ['id' => $service->id]) }}" class="btn btn-warning">Edit</a>
            
            <!-- Add a "Destroy" button -->
            <form action="{{ route('admin.services.destroy', ['id' => $service->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
            </form></td>
            </tr>
            @endforeach
    </table>
    
    @endsection