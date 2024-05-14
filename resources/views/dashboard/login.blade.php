@extends('layouts.index')
@section('content')
<div class="wrapper">
    <form method="POST" action="{{route('login.auth')}}" class="p-3 mt-3 text-center">
        @csrf
        <div class="h5 font-weight-bold text-center mb-3">Log In</div>
        @if (Session::get('Add'))
        <div class="alert alert-success w-100">
        {{Session::get('Add')}}
        </div>
        @endif
        @if (Session::get('log'))
        <div class="alert alert-success w-100">
        {{Session::get('log')}}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $fail)
                    <li>{{ $fail }}<li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group d-flex align-items-center">
            <div class="icon"><span class="far fa-user"></span></div>
            <input autocomplete="off" type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group d-flex align-items-center">
            <div class="icon"><span class="fas fa-key"></span></div>
            <input autocomplete="off" type="password" name="password" class="form-control" placeholder="Password">
            <div class="icon btn"><span class="fas fa-eye-slash"></span></div>
        </div>
        <div class="mb-2">
            <label class="option">Remember me
                <input type="checkbox" checked>
                <span class="checkmark"></span>
            </label>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Login</button>
    </form>
     <center><p>Don't have an account? <a href="register" class="link-info">SignUp here</a></p></center>
</div>
@endsection
