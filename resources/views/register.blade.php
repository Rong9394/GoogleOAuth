@extends('layouts.main')

@section('content')

    <div class="row h-100 justify-content-center align-items-center">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h2 class="card-title text-center">NewCo. Registration</h2>
                <div class="card-body">
                    <p class="text-center">Already have an account? <a href="/login" class="card-link">Login</a></p>

                    <br>

                    <div class="text-center">
                        <a href="/auth/redirect"><img src="{{ asset('images/google-sign-in-btn.png') }}" width="300" /></a>
                    </div>

                    <br>
                    <h5>or email and password</h5>
                    <br>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="nameInput">Name</label>
                            <input type="text" class="form-control" id="nameInput" name="name" aria-describedby="nameHelp" placeholder="Your name">
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="emailInput">Email address</label>
                            <input type="email" class="form-control" id="emailInput" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="passwordInput">Password</label>
                            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary w-100">Register for your free account</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="https://accounts.google.com/gsi/client" async defer></script>

@endsection


<style>
    h5 {
        overflow: hidden;
        text-align: center;
    }

    h5:before,
    h5:after {
        background-color: #000;
        content: "";
        display: inline-block;
        height: 1px;
        position: relative;
        vertical-align: middle;
        width: 50%;
    }

    h5:before {
        right: 0.5em;
        margin-left: -50%;
    }

    h5:after {
        left: 0.5em;
        margin-right: -50%;
    }
</style>
