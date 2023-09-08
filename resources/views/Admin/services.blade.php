@extends('layouts.header')

@section('content')
<h1 class="title">Services</h1>
 <div class="add-button"> 
            <a href="" class="btn btn-primary">Add</a> 
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
                <td><a href="" class="btn btn-info">View</a> <!-- Show button -->
                <a href="" class="btn btn-warning">Edit</a> <!-- Edit button --></td>
            </tr>
            @endforeach
    </table>
    
    @endsection