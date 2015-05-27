<!DOCTYPE html>
<html>
<head>
    <title>
        Ice Cream Blog
    </title>
    <a href='/'>Ice Cream Blog</a>
        @yield('head')
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
    <header>
        @if(Session::get('username'))
            <p>Hello {{$username}}</p>
	    <a href="/newpost">Write Post</a>
	    <a href="/logout">Log Out</a>
	@endif
	@if(!(Session::get('username')))
	    <a href="/login">Log In </a>
	    <a href="/signup">Sign Up</a>
	@endif
    </header>
    @yield('content')
</body>
</html>