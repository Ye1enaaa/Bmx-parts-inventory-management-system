@extends('system-users.navbar')

@section('content')


@section('top-bar')
<div class="bar">
<ul class="bg-blue-500">
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <div class="logout" aria-labelledby="navbarDropdown">
            <a class="logout-link dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt "></i>  Logout
            </a>

            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</ul>



@endsection