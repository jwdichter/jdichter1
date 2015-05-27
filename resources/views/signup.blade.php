@extends('_master')

@section('content')
    <h3>Sign Up</h3>
    <div id="one">
        <h2>Form Necessities</h2>
        <ul>
            <li>All Fields must be filled out</li>
            <li>Username must be at least 6 letters</li>
            <li>Password must contain 8 characters</li>
            <li>Password must contain an uppercase, a lowercase, and a number</li>
            <li>Password and Verify Password must match</li>
        </ul>
    </div>
    <div id="two">
        <h2>User</h2>
        <form>
            <h3>Username</h3>
            <input id="un" type="text" placeholder="Username" value="{{$username}}" required></input>
            <h3>Password</h3>
            <input id="pw" type="password" placeholder="Password" value="{{$password}}" required></input>
            <h3>Verify Password</h3>
            <input id="vpw" type="password" placeholder="Verify Password" value="{{$verifyPw}}" required></input>
            <h3>Email</h3>
            <input id="e" type="email" placeholder="Email" value="{{$email}}" required></input>
            <button id="click" type="submit">Submit</button>
        </form>
    </div>    
    <div>
    @if($error)
        {{$error}}
    @endif
    </div>
@stop