@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">
    <h1 class="title">Themes</h1>
    <div class="add-button"> 
        <a href="{{ route('admin.themes.create') }}" class="btn btn-primary">Add</a> 
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
                <a href="{{ route('admin.themes.edit', ['id' => $theme->id]) }}" class="btn btn-warning">Edit</a> <!-- Edit button -->
                <form action="{{ route('admin.themes.destroy', ['id' => $theme->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
