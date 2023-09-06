@extends('layouts.app')

@section('content')
    <div class="Services-Container">
        <h1>Services</h1>

        <ul >
            @foreach ($servicesItems as $key => $servicesItem)
            <li  class="bd" style="background-image: linear-gradient(rgba(0,0,0,50%),rgba(0,0,0,50%)), url({{ $servicesItem->services_image }});">
                <a href="">{{ $servicesItem->services_category }}</a>
                </li>
            @endforeach

        </ul>
        </div>
    
@endsection