
@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/packages.css') }}">

<div class="Customization-form">
            <h1 id="title">Reservation Form</h1>
            <div class="form-information">
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
                <table class="table-Information">
                    <tr>
                        <td>Celebrant Name:</td>
                        <td><input disabled type="text" name="" id="" placeholder="Name"></td>
                    </tr>
                    <tr>
                        <td>Venue Address:</td>
                        <td><input disabled type="text" name="" id="" placeholder="Address"></td>
                    </tr>
                    <tr>
                        <td>Celebrant Age:</td>
                        <td><input disabled type="number" name="" id="" placeholder="Age"></td>
                    </tr>
                    <tr>
                        <td>Celebrant Gender:</td>
                        <td><input disabled type="text" name="" id="" placeholder="Gender"></td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td><input disabled type="datetime-local" name="" id="" ></td>
                    </tr>
                </table>
                <main class="optionForm">
                    <table >
                        <tr>
                            <td>Pork/Beef:</td>
                            
                            <td>
                                <Select>
                                    <option value=""></option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </Select>
                        </td>
                        <td>
                            <select name="" id="selection">
                                <option value="">Beef</option>
                                <option value="">Pork</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td>Fish/Seafood:</td>
                            <td>
                                <Select>
                                    <option value=""></option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </Select>
                        </td>
                        <td>
                            <select name="" id="selection">
                                <option value="">Fish</option>
                                <option value="">Seafood</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td>Chicken</td>
                            <td>
                                <select name="" id="">
                                    <option value=""></option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Vegetable:</td>
                            <td>
                                <Select>
                                    <option value=""></option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </Select>
                        </td>
                        </tr>
                        <tr>
                            <td>Pasta/Pansit:</td>
                            <td>
                                <Select>
                                    <option value=""></option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </Select>
                        </td>
                        </tr>
                        <tr>
                            <td>Desserts:</td>
                            <td>
                                <Select>
                                    <option value=""></option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </Select>
                        </td>
                        </tr>
                        <tr>
                            <td>Drinks:</td>
                            <td>
                                <Select>
                                    <option value=""></option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </Select>
                        </td>
                        </tr>
                    </table>
                </div>
                <div class="btn-FoodCustom"><button type="submit" id="openModalButton">Proceed</button></div>
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close" id="closeModalButton">&times;</span>
                       <div>
                        <h1>Are you sure to submit this form?</h1>
                        
                </div>
                <div><button><a href="/USER/PHP/History.html">Yes</a></button> <button><a href="sum-order.html">No</a></button></div>
                
                    </div>
                </div>
        </div>

@endsection