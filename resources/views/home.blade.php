@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Welcome, {{ Auth::user()->name }}!</p>

                    <div class="mt-4">
                        @if(Auth::user()->two_factor_enabled)
                            <div class="alert alert-success">
                                2FA is currently enabled for your account.
                            </div>
                            <form method="POST" action="{{ route('2fa.disable') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Disable 2FA</button>
                            </form>
                        @else
                            <div class="alert alert-warning">
                                2FA is not enabled for your account.
                            </div>
                            <a href="{{ route('2fa.setup') }}" class="btn btn-primary">Enable 2FA</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
