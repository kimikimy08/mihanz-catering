

@extends('layouts.header')

@section('content')
    <h1 class="title">
        @if(isset($menuCategory))
            {{ $menuCategory->menu_category }} Menu
        @else
            All Menus
        @endif
    </h1>

    @if(isset($menuCategories))
        <div class="menu-nav">
        <ul>
        <li><a href="{{ route('admin.menu', 'all') }}" class="{{ Request::is('admin/menu/all*') ? 'active' : '' }}">All</a></li>
        @foreach($menuCategories as $category)
            <li><a href="{{ route('admin.menu', $category->menu_category) }}" class="{{ Request::is('admin/menu/' . $category->menu_category . '*') ? 'active' : '' }}">{{ $category->menu_category }}</a></li>
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
                <th>Edit</th>
            </tr>
            @foreach($menuItems as $menu)
                <tr>
                    <td><img src="{{ asset($menu->menus_image) }}" alt="" id="userImage"></td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>{{ $menu->price }}</td>
                    <td>{{ $menu->status }}</td>
                    <td><a href="">Update</a></td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
