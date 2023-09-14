@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">

<div class="container"> 
        <main>
        <h1>Create Menu</h1>
        <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
            <table>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <tr>
                    <td>Name:</td>
                    <td><input type="text" class="form-control" id="name" name="name" required></td>
                    
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="text" class="form-control" id="price" name="price" required></td>
                </tr>
                <tr>
                    <td>Type of Dish:</td>
                    <td>
                    <select class="form-control" id="menu_selection_id" name="menu_selection_id" required>
            @foreach ($menuSelections as $id => $category)
                <option value="{{ $id }}">{{$category}}</option>
            @endforeach
        </select>
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td> <textarea class="form-control" name="description" id="description" cols="32" rows="3"></textarea></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><select name="status" id="status">
                        <option value="active">Active</option>
                        <option value="inactive">inactive</option>
                    </select>
                </td>
                    
                </tr>
                <tr>
                    <td>Image</td>
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
