@extends('layouts.auth')

@section('content')
<div class="container" style="height: 100vh">
    <div class="row justify-content-center h-100">
        <div class="col-md-4 align-self-center">
            <div class="text-center mb-4">
                <h1>IKET</h1>
                IT Ticketing
            </div>
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input 
                                type="text"
                                class="form-control @error('username') is-invalid @enderror"
                                name="username"
                                id="username"
                                value="{{ old('username') }}"
                                required 
                                autocomplete="username" 
                                autofocus
                            >
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input 
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                id="password"
                                required
                            >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
