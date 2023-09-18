@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Services.css') }}">

<div class="promo-container">
        <a href="" class="back-btn">&#8592;</a>
        <img src="{{ asset('images/services/packages/' . $promo->service_promo_image) }}" alt="{{ $promo->name }}" id="promo">
        <button type="button" class="promo-btn">Select</button>
    </div>
    
@endsection