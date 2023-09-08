@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Services.css') }}">

<div class="Birthday-Package-Information">
        <a href="/USER/PHP/servicesPromo/birthdayPromo/bdpIndex.html" class="back-btn">&#8592;</a>
        <h1>Birthday Package</h1>
        <h2>Customize your own Package</h2>
            <p><ul>
                <li>Amazing Deals</li>
                <li>Make your reservation within 7 days for preparations</li>
                <li>We can customize your package base on your budget</li>
                <li>Customize your own package given to your budget and number person you provide</li>
                <li>Budget must be 15,000 minimum that the cater can provide</li>
                <li>Guest count must be 50 minimum that the cater can provide</li>
            </ul>
            </p>
            <div class="Button-Proceed"><button><a href="bdpForm.html">Proceed</a></button></div>
        </div>
    
@endsection