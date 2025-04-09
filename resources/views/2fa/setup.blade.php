@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Set Up Two-Factor Authentication</div>

                <div class="card-body">
                    <p>Scan this QR code with your authenticator app:</p>
                    <div class="text-center">
                        {!! $qrCodeUrl !!}
                    </div>
                    <p class="mt-3">Or enter this secret key manually:</p>
                    <div class="alert alert-info">
                        {{ $secret }}
                    </div>

                    <form method="POST" action="{{ route('2fa.enable') }}">
                        @csrf
                        <div class="form-group">
                            <label for="code">Enter verification code</label>
                            <input type="text" class="form-control" id="code" name="code" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Enable 2FA</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
