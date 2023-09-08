@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Pages.css') }}">
<section class="slider-wrapper">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($themesItems as $key => $themesItem)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ asset($themesItem->theme_image) }}" class="d-block mx-auto img-fluid" alt="{{ $themesItem->theme_name }}" style="max-width: 90%; max-height: 80vh;">
                    <div class="carousel-caption">
                        <h2>{{ $themesItem->theme_name }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
@endsection
