@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@section('content')
   <div class="flex justify-center">
       <div class="w-4/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                {{session('status')}}
            @endif

            <form action="{{route('login') }}"method="post">
                @csrf

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')
                    border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                    <div class="alert alert-warning" role="alert">
                       <p> {{$message}} </p>
                    </div>
                @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')
                    border-red-500 @enderror" value="">

                    @error('password')
                    <div class="alert alert-warning" role="alert">
                        <p> {{$message}} </p>
                     </div>
                @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <input for="remember">Remember me</label>
                    </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                    font-medium w-full">Login</button>
                </div>
                
            </form>
       </div>
   </div>
@endsection


