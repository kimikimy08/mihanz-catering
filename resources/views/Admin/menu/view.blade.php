@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">

<div class="container">
        <main  class="menu-crud">
            <img src="" alt="" id="MenuImg">
            <table class="viewMenu" >

                <img src="" alt="">

        
                <tr>
                    <td>Name:</td>
                    <td>{{$menu->name}}</td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>{{$menu->price}}</td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>{{$menu->description}}</td>
                </tr>
                
                <tr>
                    <td>Type of Dish</td>
                    <td>{{$menu->menuSelection->menu_category}}
                </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                    {{$menu->status}}
                    </td>
                </tr>

                <tr>
                    <td>Image</td>
                    <td>
                    <img src="{{ asset($menu->menus_image) }}" alt="" id="userImage">
                    </td>
                </tr>

                <tr>
                    <td><button><a href="{{ route('admin.menu.edit', ['id' => $menu->id]) }}">Edit</a></button></td>
                    <td></td>
                </tr>
            </table>

        </main>

    </div>


@endsection
