@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">

<div class="container"> 
    <main>
        <h1 class="title">Edit Service</h1>
        <form method="POST" action="{{ route('admin.packages.update', ['id' => $servicePromo->service_selection_id, 'p_id' => $servicePromo->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <table class="services-table">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" id="name" name="name" class="form-control" value="{{ $servicePromo->name }}" required></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea id="description" name="description" class="form-control" required>{{ $servicePromo->description }}</textarea></td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        @if($servicePromo->service_promo_image)
                        <img src="{{ asset($servicePromo->service_promo_image) }}" alt="Current Image" id="currentImage">
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
