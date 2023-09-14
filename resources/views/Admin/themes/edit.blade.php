@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">

<div class="container"> 
    <main>
        <h1 class="title">Edit Themes</h1>
        <form method="POST" action="{{ route('admin.themes.update', ['id' => $theme->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <table class="services-table">
                <tr>
                    <td>Theme Name:</td>
                    <td><input type="text" name="theme_name" id="theme_name" value="{{ old('theme_name', $theme->theme_name) }}"></td>
                </tr>
                <tr>
                    <td>Service Category:</td>
                    <td><select class="form-control" id="service_selection_id" name="service_selection_id" required>
                @foreach ($serviceSelections as $id => $category)
                    <option value="{{ $id }}" {{ $theme->service_selection_id == $id ? 'selected' : '' }}>{{ $category }}</option>
                @endforeach
            </select></td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        @if($theme->theme_image)
                        <img src="{{ asset($theme->theme_image) }}" alt="Current Image" id="currentImage">
                        @else
                            No Image
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>New Image:</td>
                    <td><input type="file" name="image" id="image"></td>
                </tr>
                <tr>
                    <td><button type="submit" class="services-btn">Save</button></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </main>
</div>

@endsection
