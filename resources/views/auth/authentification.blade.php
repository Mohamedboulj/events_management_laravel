@extends('dashboard.layouts.app')
@section('title', 'Register')
@section('content')
<div class="row ">
    <div class="card col-md-4 offset-md-4  my-2 shadow">
        <form action="/register" method="post" class="m-2">
            @csrf
            <div class="text-center"><h3 class="text-center mb-3">Register</h3> <h5 class="text-center">Or</h5>  <a href="/login" class="text-center">log in if your have an account </a></div>

            <div class="form-floating my-2">
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="floatingInput" name="name" placeholder="Name">
                <label class="form-label" for="floatingInput">Name</label>
            </div>
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="floatingInput" name="email" placeholder="name@example.com">
                <label class="form-label" for="floatingInput">Email address</label>
            </div>
            @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <div class="form-floating my-2">
                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="floatingPassword" name="password" placeholder="Password">
                <label class="form-label" for="floatingPassword">Password</label>
            </div>
            @error('password')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>

        </form>
    </div>
</div>

@endsection
