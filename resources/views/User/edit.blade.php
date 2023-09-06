@extends('layouts.app')

@section('content')

<div class="userEditProfileContainer">
    <h1>Edit Your Profile</h1>

    <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="table-container">

   <table class="responsive-table">
   <tr>
            <td><label for="address">Name:</label></td>
            <td><input type="text" id="name" name="name" value="{{ $user->name }}"></td>
   </tr>  

   <tr>
   <td><label for="address">Address:</label></td>
   <td><input type="text" id="address" name="address" value="{{ $user->address }}"></td>
</tr>

            <tr>   
            <td><label for="contact_number">Contact Number:</label></td>
            <td><input type="text" id="contact_number" name="contact_number" value="{{ $user->contact_number }}"></td>
</tr>

            <tr>   
            <td><label for="email">Email:</label></td>
            <td><input type="email" id="email" name="email" value="{{ $user->email }}"></td>
</tr>

            <tr>
            <td><label for="profile_pic">Profile Picture:</label></td>
            <td><input type="file" id="profile_pic" name="profile_pic" ></td>
</tr>
   </table>
       
        </div>

       
            <button type="submit" id="btn-update">Update Profile</button>
        
    </form>
</div>

@endsection