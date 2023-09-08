@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Pages.css') }}">

<div class="Food-Container">
    <div>
        <button class="back-btn">
            <a href="/menu"><IoMdArrowRoundBack/></a>
        </button>
    </div>

    <h1>{{ $categoryName }} Menu</h1>
    
    @foreach ($menus as $menu)
    <li class="Food-Card-Menu">
        <div>
            <!-- Display the menus_image from the Menu table -->
            <img src="{{ asset('images/menu/' . $menu->menus_image) }}" alt="" class="foodimg" onclick="openModal('{{ $menu->name }}', '{{ $menu->description }}', '{{ asset('images/menu/' . $menu->menus_image) }}')">
        </div>
        <div>
            <p class="Food-name">{{ $menu->name }}</p>
        </div>
    </li>
    @endforeach

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModalButton" onclick="closeModal()">&times;</span>
            <!-- Display the menus_image in the modal -->
            <img src="" alt="" id="foodImage">
            <div>
                <h1 id="foodName"></h1>
                <p id="foodDescription"></p>
            </div>
        </div>
    </div>
</div>

<script>
const modal = document.getElementById("modal");
const foodName = document.getElementById("foodName");
const foodDescription = document.getElementById("foodDescription");
const foodImage = document.getElementById("foodImage");

function openModal(name, description, imageUrl) {
    foodName.textContent = name;
    foodDescription.textContent = description;
    foodImage.src = imageUrl;
    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}

window.addEventListener("click", function (event) {
    if (event.target === modal) {
        closeModal();
    }
});
</script>

@endsection
