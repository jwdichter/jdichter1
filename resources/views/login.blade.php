@extends('_master')

@section('content')
	<form method="post" action="/login">
	    <h3>Log In</h3>
		<input type="text" name="username" placeholder="Username"/>
		<input type="password" name="password" placeholder="Password"/>
                <input type="submit" class="submit" value="Log In"/>

	</form>
    <div class="error">
    @if($error)
        {{$error}}
    @endif
    </div>
@stop