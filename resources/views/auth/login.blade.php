@extends('layouts.app')

@section('content')


    <div class="Login-Container">
            

    <form method="POST" action="{{ route('login') }}">
                        @csrf
        <h1 class="Login">{{ __('Login') }}</h1>
        <label>{{ __('Email Address') }}</label> <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
           
            <label>{{ __('Password') }}</label> <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror


           <div class="btn-Login"> <button class="btn btn-primary">    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> </button>
           <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                           
 </div> 
        </form>
</div>
    

@endsection
