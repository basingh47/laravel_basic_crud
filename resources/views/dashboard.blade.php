@php
    
    use Illuminate\Support\Facades\Auth;
@endphp

<h1>Dashboard</h1>

<p>Welcome, {{ Auth::user()->email }}</p>
