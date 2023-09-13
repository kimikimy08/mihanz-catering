@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">

<div class="container"> 
    <main>
        <h1 class="title">Edit Service</h1>
        <form method="POST" action="{{ route('admin.services.update', ['id' => $service->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <table class="services-table">
                <tr>
                    <td>Service Category:</td>
                    <td><input type="text" name="services_category" id="services_category" value="{{ old('services_category', $service->services_category) }}"></td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        @if($service->services_image)
                        <img src="{{ asset($service->services_image) }}" alt="Current Image" id="currentImage">
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
