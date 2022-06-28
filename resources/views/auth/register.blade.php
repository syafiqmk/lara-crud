@extends('layouts.main')

@section('content')
    <h2 class="text-center">Registration</h2>

    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <form action="/register" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" autocomplete="off" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email@mail.com" class="form-control @error('email') is-invalid @enderror" autocomplete="off" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection