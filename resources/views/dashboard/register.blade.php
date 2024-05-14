@extends('layouts.index')
@section('content')
<div class="wrapper">
    
    <form method="POST" action="{{route('register.createAccount')}}" class="p-3 mt-3">
        
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $eror)
                    <li>{{ $error }}<li>
                @endforeach
            </ul>
        </div>
        @endif

        @csrf
        <div class="h5 font-weight-bold text-center mb-3">Sign Up</div>
        <div class="form-group d-flex align-items-center">
            <div class="icon"><span class="far fa-user"></span></div>
            <input autocomplete="off" type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group d-flex align-items-center">
            <div class="icon"><span class="far fa-user"></span></div>
            <input autocomplete="off" type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group d-flex align-items-center">
            <div class="icon"><span class="far fa-envelope"></span></div>
            <input autocomplete="off" type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group d-flex align-items-center">
            <div class="icon"><span class="fas fa-key"></span></div>
            <input autocomplete="off" type="password" name="password" class="form-control" placeholder="Password">
            <div class="icon btn"><span class="fas fa-eye-slash"></span></div>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Sign Up</button>
    </form>
</div>
@endsection
