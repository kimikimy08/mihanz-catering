@extends('layouts.header')

@section('content')
    <h1 class="title">Themes</h1>
    <div class="add-button"> 
        <a href="" class="btn btn-primary">Add</a> 
    </div> 
    <table>
        <tr>
            <th>Image</th>
            <th>Service Category</th>
            <th>Theme</th>
            <th></th>
        </tr>
        @foreach ($themes as $key => $theme)
        <tr>
            <td><img src="{{ asset($theme->theme_image) }}" alt="" id="userImage"></td>
            <td>{{ $theme->serviceSelection->services_category }}</td>
            <td>{{ $theme->theme_name }}</td>
            <td>
                <a href="" class="btn btn-info">View</a> <!-- Show button -->
                <a href="" class="btn btn-warning">Edit</a> <!-- Edit button -->
            </td>
        </tr>
        @endforeach
    </table>
@endsection
