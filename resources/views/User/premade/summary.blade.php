
@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/packages.css') }}">

<main class="request-summary">
        <div class="Customization-form">
            <h1 id="title">Reservation Form</h1>
            <div class="form-information">
                <h1 class="Form-title">
                    PLEASE READ FIRST
                </h1>
    
                <p>
                    Reservation Package for <b>50</b> Guest
                    The Package you chose already includes the following:
                </p>
                <ul>
                    <li>Pork/Beef</li>
                    <li>Chicken/Fish/Seafood</li>
                    <li>Vegetable</li>
                    <li>Pasta/Pansit</li>
                    <li>Dessert</li>
                    <li>Drinks</li>
                    <li>Complete setup of buffet</li>
                    <li>Basic setup of backdrop</li>
                    <li>Gift Table</li>
                    <li>Cake Table</li>
                    <li>Skirting</li>
                    <li>Chairs & Tables with cover</li>
                    <li>Waiter & Food attendant</li>
                    <li>Utensils</li>
                    
                </ul>
    
            </div>
            <h1>Celebrant Information</h1>
            <table class="table-Information">
                <tr>
                    <td>Celebrant Name:</td>
                    <td>{{ $reservation->celebrant_name }}</td>
                </tr>
                <tr>
                    <td>Venue Address:</td>
                    <td>{{ $reservation->event_location }}</td>
                </tr>
                <tr>
                    <td>Celebrant Age:</td>
                    <td>{{ $reservation->celebrant_age }}</td>
                </tr>
                <tr>
                    <td>Celebrant Gender:</td>
                    <td>{{ $reservation->celebrant_gender }}</td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td>{{ $reservation->event_date }}</td>
                </tr>
                <tr>
                    <td>Start Time:</td>
                    <td>{{ $reservation->start_time }}</td>
                </tr>
                <tr>
                    <td>End Time:</td>
                    <td>{{ $reservation->end_time }}</td>
                </tr>
            </table>
            <main class="optionForm">
                <h1>Menu Selected</h1>
                <table >
                    <tr>
                        <td>Pork/Beef:</td>
                        <td>{{ $reservation->porkBeefMenu->name }}</td>
                    </tr>
                    <tr>
                        <td>Chicken/Fish/Seafood:</td>
                        <td>{{ $reservation->chickenFishSeafoodMenu->name }}</td>
                    </tr>
                    <tr>
                        <td>Vegetable:</td>
                        <td>{{ $reservation->vegetableMenu->name }}</td>
                    </tr>
                    <tr>
                        <td>Pasta/Pansit:</td>
                        <td>{{ $reservation->pastaMenu->name }}</td>
                    </tr>
                    <tr>
                        <td>Desserts:</td>
                        <td>{{ $reservation->dessertMenu->name }}</td>
                    </tr>
                    <tr>
                        <td>Drinks:</td>
                        <td>{{ $reservation->drinkMenu->name }}</td>
                    </tr>
                </table>    
                    <div class="btn-FoodCustom"><button type="submit" id="openModalButton">Proceed</button></div>
                </div>
                
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close" id="closeModalButton">&times;</span>
                       <div>
                        <h1>Are you sure to submit this form?</h1>
                        
                </div>
                <div><button><a href="/USER/PHP/NewReservation.html">Yes</a></button> <button><a href="sum-order.html">No</a></button></div>
                
                    </div>
                </div>
        </div>
        
    </main>

@endsection