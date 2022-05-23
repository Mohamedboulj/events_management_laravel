@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="row">
    <div class="card col-md-4 offset-md-4  my-2 shadow">
        <form action="/login" method="post" class="m-2">
            @csrf
            <div class="text-center"><h3 class="text-center mb-3">Login</h3><h5>You don't have an account?</h5><a href="/register" class="text-center">register</a></div>

            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com">
                <label class="form-label" for="floatingInput">Email address</label>
            </div>
            @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <div class="form-floating my-2">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
                <label class="form-label" for="floatingPassword">Password</label>
            </div>
            @error('password')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

        </form>
    </div>
</div>
@endsection
