

@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/menu.css') }}">
    <h1 class="title">
        @if(isset($menuCategory))
            {{ $menuCategory->menu_category }} Menu
        @else
            All Menus
        @endif
    </h1>

    <div class="add-button"> 
 <a href="" class="btn btn-primary">Add</a> 
        </div> 

    @if(isset($menuCategories))
        <div class="menu-nav">
        <ul>
        <li><a href="{{ route('admin.menu.index', 'all') }}" class="{{ Request::is('admin/menu/all*') ? 'active' : '' }}">All</a></li>
        @foreach($menuCategories as $category)
            <li><a href="{{ route('admin.menu.index', $category->menu_category) }}" class="{{ Request::is('admin/menu/' . $category->menu_category . '*') ? 'active' : '' }}">{{ $category->menu_category }}</a></li>
        @endforeach
    </ul>
        </div>
    @endif

    @if(isset($menuItems))
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach($menuItems as $menu)
                <tr>
                    <td><img src="{{ asset($menu->menus_image) }}" alt="" id="userImage"></td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>{{ $menu->price }}</td>
                    <td>{{ $menu->status }}</td>
                    <td><a href=""><a href="" class="btn btn-info">View</a>
            <a href="" class="btn btn-warning">Edit</a>
            
            <!-- Add a "Destroy" button -->
            <form action="" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
            </form></a></td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
