@php
    
    use Illuminate\Support\Facades\Auth;
@endphp

<h1>Dashboard</h1>
<a href="{{ route('logout') }}">logout</a>

<p>Welcome, {{ Auth::user()->email }}</p>
