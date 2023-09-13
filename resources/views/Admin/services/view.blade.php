@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">
<div class="view-container">

    <main>
        <h1 class="title">Package</h1>
        <div><a href="{{ route('admin.packages.create', ['id' => $service->id]) }}" class="btn btn-primary">Add</a> </div>
        <table class="view-tbl">
            <tr>
                <th>Image</th>
                <th>Package Name</th>
                <th>Description</th>
                <th></th>
            </tr>
            @foreach($packages as $package)
            <tr>
                <td><img src="{{ asset($package->service_promo_image) }}" alt="" id="userImage"></td>
                <td>{{ $package->name }}</td>
                <td>{{ $package->description }}</td>
                <td>
                <a href="{{ route('admin.packages.edit', ['id' => $service->id, 'p_id' => $package->id]) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.packages.destroy', ['id' => $service->id, 'p_id' => $package->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
            </form>
                </td>
            </tr>
            @endforeach
        </table>
    </main>


</div>
    
    @endsection