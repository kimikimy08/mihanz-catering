@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">

<div class="container"> 
        <main>
        <form action="{{ route('admin.themes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
            <table>
                <tr>
                    <td>Theme Name</td>
                    <td><input type="text" class="form-control" id="theme_name" name="theme_name" required></td>
                </tr>
                <tr>
                    <td>Service Category</td>
                    <td>
                    <select class="form-control" id="service_selection_id" name="service_selection_id" required>
            @foreach ($serviceSelections as $id => $category)
                <option value="{{ $id }}">{{ $category }}</option>
            @endforeach
        </select>
                    </td>
                </tr>
                <tr>
                    <td>Theme Image</td>
                    <td> <input type="file" name="image" id="image"></td>
                </tr>
                <tr>
                    <td><button type="submit" class="btn btn-primary">Add</button></td>
                </tr>
            </table>
            </form>
        </main>
    </div>


@endsection
