@auth
	Welcome back, {{ Auth::user()->name }}!
@else
Hello, stranger! 
<a href="{{ route('login') }}">Login</a> 
or <a href="{{ route('register') }}">Register</a>
@endauth