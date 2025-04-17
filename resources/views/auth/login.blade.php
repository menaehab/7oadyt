@extends('partials.master')
@section('page-title', __('Login'))
@section('content')
    <div class="auth-wrapper my-5" style="height: 60vh">
        <div class="auth-container">
            <form method="POST" action="{{ route('login') }}" class="tab-content bg-white p-4 rounded shadow" dir="rtl">
                @csrf
                <h3 class="text-center py-4">{{ __('Login') }}</h3>
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="loginName" class="form-control" />
                        <label class="form-label" for="loginName">{{ __('Email') }}</label>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="loginPassword" class="form-control" />
                        <label class="form-label" for="loginPassword">{{ __('Password') }}</label>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">{{ __('Login') }}</button>
            </form>
        </div>
    </div>
@endsection
