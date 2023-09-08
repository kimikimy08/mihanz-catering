@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Services.css') }}">

<div class='Event-Container'>
        <div class="btn-position"><button class="back-btn"><a href="/services"><IoMdArrowRoundBack/></a></button></div> 
        <h1>
        {{ $categoryName }} Promos
        </h1>
        <ul>
            @foreach ($promos as $promo)
    <li>
        <a href="">
            <h1>{{ $promo->name }}</h1>
            <p>{{ $promo->description }}</p>
        </a>
    </li>
@endforeach
            <li>
                <a href="bpCustomization.html">
                    <h1>Customization base<br /> on your Budget</h1>
                </a>
            </li>
            <li>
                <a href="../mostOrderedMenu.html"><h1>Most Ordered Menu</h1></a>
            </li>
        </ul>



    </div>
    
@endsection