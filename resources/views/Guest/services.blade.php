@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Services.css') }}">

    <div class="Services-Container">
        <h1>Services</h1>

        <ul >
            @foreach ($servicesItems as $key => $servicesItem)
            <li  class="bd" style="background-image: linear-gradient(rgba(0,0,0,50%),rgba(0,0,0,50%)), url({{ $servicesItem->services_image }});">
            <a href="/services/{{ $servicesItem->services_category }}/promos">{{ $servicesItem->services_category }}</a>
                </li>
            @endforeach

        </ul>
        </div>
    
@endsection