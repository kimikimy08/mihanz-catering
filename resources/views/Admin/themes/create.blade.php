@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Theme</h2>
    <form action="{{ route('admin.themes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="theme_name">Theme Name</label>
        <input type="text" class="form-control" id="theme_name" name="theme_name" required>
    </div>
    <div class="form-group">
        <label for="service_selection_id">Service Category</label>
        <select class="form-control" id="service_selection_id" name="service_selection_id" required>
            @foreach ($serviceSelections as $id => $category)
                <option value="{{ $id }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="theme_image">Theme Image</label>
        <input type="file" name="image" id="image">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
</div>
@endsection
