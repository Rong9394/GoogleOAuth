
@extends('layouts.authenticated')

@section('content')

    <div class="row h-100 justify-content-center align-items-center">
        <div class="card mt-5" style="width: 25rem;">
            <div class="card-body">
                <h2 class="card-title">New Co. Dashboard</h2>
                <div class="card-body">
                    Hello, {{ $user->name }} ({{ $user->email }}).
                    <div>
                        <br>
                        You've logged in using {{ $user->password === null ? 'Google SSO' : 'an email/password' }}.
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



