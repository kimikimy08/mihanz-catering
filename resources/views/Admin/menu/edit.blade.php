@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">

<div class="container">
        <main  class="menu-crud">
        <h1 class="title">Edit Menu</h1>
        <form method="POST" action="{{ route('admin.menu.update', ['id' => $menu->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="viewMenu" >
                <img src="" alt="" id="MenuImg">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" id="name" name="name" class="form-control" value="{{ $menu->name }}" required></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input   type="number" id="price" name="price" class="form-control" value="{{ $menu->price }}" required></td>
                </tr>
                <tr><td>Type of Dish:</td><td><select class="form-control" id="menu_selection_id" name="menu_selection_id" required>
                @foreach ($menuSelection as $id => $menu_category)
                    <option value="{{ $id }}" {{ $menu->menu_selection_id == $id ? 'selected' : '' }}>{{ $menu_category }}</option>
                @endforeach
            </select></td></tr>
                <tr>
                    <td>Description:</td>
                    
                    <td><textarea id="description" name="description" class="form-control" cols="32" rows="3">{{$menu->description}}</textarea></td>
                </tr>
                
                <tr>
                    <td>Status</td>
                    <td>
                    <select name="status" id="status" class="form-control">
            <option value="active" {{ $menu->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $menu->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
                    </td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        @if($menu->menus_image)
                        <img src="{{ asset($menu->menus_image) }}" alt="Current Image" id="currentImage">
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
