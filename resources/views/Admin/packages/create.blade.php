@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Service Promo</h1>
    <form method="POST" action="{{ route('admin.packages.store', ['id' => $serviceSelection->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="service_promo_image">Image</label>
            <input type="file" name="image" id="image">
        </div>
        <!-- Add form fields for other service promo properties as needed -->
        <button type="submit" class="btn btn-primary">Create Service Promo</button>
    </form>
</div>
@endsection
