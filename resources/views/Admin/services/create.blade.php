@extends('layouts.header')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin/services.css') }}">

<div class="container"> 
    <main>
        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
            @csrf
            <table class="services-table">
                <tr>
                    <td>Service Category:</td>
                    <td><input type="text" name="services_category" id="services_category"></td>
                </tr>
                <tr>
                    <td>Image</td>
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
