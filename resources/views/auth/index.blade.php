@extends('layouts.main')

@section('content')
    <h2 class="text-center">Login</h2>
    
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('registerSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('registerSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="/login" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email@mail.com" class="form-control @error('email') is-invalid @enderror" autocomplete="off" required value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            <small>Doesn't have account yet? <a href="/register">Register</a></small>
        </div>
    </div>
@endsection