@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @include('modules/sessions_messages')
                    <h5>{{ __('Account created') }}</h5>
                    <p>{{ __('Please confirm the e-mail.') }}</p>
                    <p>{{ __('An activation link was sent to your e-mail.') }}</p>

                    @if (session('registered_email'))
                    <p>{{ __('Your e-mail address is') }}: 
                        <strong title="{{ session('registered_email') }}">{{ session('registered_email') }} </strong>.
                    </p>
                    @endif                    
                    <a href="{{ route('login') }}">{{ __('Go to login page.') }}</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
