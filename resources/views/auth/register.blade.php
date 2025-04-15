@extends('partials.master')
@section('page-title', __('Register'))
@section('content')
    <div class="auth-wrapper my-5" style="height: 70vh">
        <div class="auth-container">
            <form method="POST" action="{{ route('register') }}" class="tab-content" dir="rtl">
                @csrf
                <h3 class="text-center py-4">{{ __('Register') }}</h3>
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form>
                        <!-- Name input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="name" name="name" id="name" class="form-control" />
                            <label class="form-label" for="name">{{ __('Name') }}</label>
                        </div>
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" name="email" id="email" class="form-control" />
                            <label class="form-label" for="email">{{ __('Email') }}</label>
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" name="password" id="password" class="form-control" />
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                        </div>

                        <!-- Password Confirmation input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" />
                            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                        </div>
                </div>

                <!-- Submit button -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                    class="btn btn-primary btn-block mb-4">{{ __('Register') }}</button>

            </form>
        </div>
    </div>
@endsection
