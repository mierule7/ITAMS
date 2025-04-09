@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Two-Factor Authentication Verification</div>

                <div class="card-body">
                    <p>Please enter the verification code from your authenticator app:</p>

                    <form method="POST" action="{{ route('2fa.authenticate') }}">
                        @csrf
                        <div class="form-group">
                            <label for="code">Verification Code</label>
                            <input type="text" class="form-control" id="code" name="code" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
