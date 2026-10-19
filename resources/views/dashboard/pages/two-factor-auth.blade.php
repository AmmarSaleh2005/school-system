@extends('layouts.dashboard.index')

<style>
     .setup-container {
            max-width: 1200px;
            margin: 25px auto;
            padding: 0 10px;
        }
     .setup-card {
            border: 1px solid #718096;
            border-radius: 14px;
            padding: 28px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px rgba(30, 50, 80, 0.03);
        }
        .section-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .section-description {
            color: #718096;
            font-size: 14px;
            line-height: 1.7;
        }
        .qr-wrapper {
            width: 220px;
            height: 220px;
            margin: 25px auto;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
        }

        .qr-placeholder {
            width: 100%;
            height: 100%;
            background: #f8fafc;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            text-align: center;
            font-size: 13px;
        }
        .warning-box {
            display: flex;
            gap: 12px;
            padding: 15px;

            border: 1px solid #f5e2a8;
            color: #805b10;
            border-radius: 9px;
            font-size: 14px;
            line-height: 1.7;
        }

        .recovery-code {
            display: block;
            padding: 12px;
            border: 1px solid #718096;
            border-radius: 7px;
            font-family: monospace;
            text-align: center;
            font-size: 14px;
        }
         .primary-btn {
            background: #2864dc;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            font-weight: 600;
        }
        .security-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #2864dc;
            border-radius: 7px;
            /* background: #eaf1ff; */
            color: #2864dc;
            font-size: 25px;
            margin-bottom: 15px;
        }

        @media (max-width: 576px) {
            .setup-container {
                margin: 25px auto;
                padding: 0 12px;
            }

            .setup-card {
                padding: 20px;
            }

            .page-header h2 {
                font-size: 23px;
            }
        }
</style>
@section('content')
    <div class="setup-container">

        <!-- Page Header -->
        <div class="page-header">
            <div class="security-icon">
                <i class="bi bi-shield-lock"></i>
            </div>

            <h2>Two-Factor Authentication</h2>

            <p>
                Add an extra layer of security to protect your account.
            </p>
        </div>


        <!-- Introduction -->
        <div class="setup-card">

            <h5 class="section-title">
                Secure your account
            </h5>

            <p class="section-description mb-0">
                Two-factor authentication helps protect your account
                by requiring a verification code in addition to your password.
                Follow the steps below to set it up.
            </p>

        </div>


        <!-- Step 1: QR Code -->

        @if (!$user->two_factor_secret)
            <p>Two factor auth disabled</p>
            <form action="{{ route('two-factor.enable') }}" method="POST">
                @csrf
                <button class="btn btn-outline-primary" type="submit" >Enable</button>
            </form>
        @else
            <p>Two factor auth enabled</p>
            <div class="setup-card">

                <h5 class="section-title">
                    <span class="step-number">1</span>
                    Scan QR Code
                </h5>

                <p class="section-description">
                    Open Google Authenticator or another compatible
                    authenticator app on your phone, then scan this QR code.
                </p>

                <div class="qr-wrapper">

                    {{-- Replace this placeholder with the real QR code from Laravel --}}
                    <div class="qr-placeholder">
                        {{-- <i class="bi bi-qr-code"></i> --}}
                        <span>{!! $user->twoFactorQrCodeSvg() !!}</span>

                    </div>

                </div>

                <p class="text-center section-description">
                    Can't scan the QR code? Enter the setup key manually.
                </p>

            </div>

            <div class="setup-card">

                <h5 class="section-title">
                    <i class="bi bi-key me-2 text-primary"></i>
                    Recovery Codes
                </h5>

                <p class="section-description">
                    Recovery codes let you access your account if you lose
                    access to your authenticator app.
                </p>

                <div class="warning-box mb-4">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>

                    <div>
                        <strong>Important!</strong>
                        Store your recovery codes in a safe place.
                        Each code should be usable only once.
                    </div>
                </div>

                {{-- Example placeholders only: use real codes generated by Laravel --}}
                <div class="row g-2 mb-4">
                    <ul class="list-group" style="list-style: none">
                        @foreach ($user->recoveryCodes() as $code)
                            <div class="col-6">
                                <div class="recovery-code">
                                    <li >{{ $code }}</li>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>

                <button type="button" class="btn secondary-btn w-100" onclick="window.print()">

                    <i class="bi bi-printer me-2"></i>
                    Print Recovery Codes

                </button>

            </div>

            <form action="{{ route('two-factor.disable') }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-outline-danger float-end" type="submit">Disable</button>
            </form>
        @endif




        <!-- Step 2: Secret Key -->
        {{-- <div class="setup-card">

            <h5 class="section-title">
                <span class="step-number">2</span>
                Setup Key
            </h5>

            <p class="section-description">
                You can manually enter this key into your authenticator app.
            </p>

            <div class="secret-key d-flex justify-content-between align-items-center gap-3">

                <code id="secretKey">YOUR_SECRET_KEY</code>

                <button type="button" class="btn btn-sm btn-outline-primary flex-shrink-0" onclick="copySecret()">

                    <i class="bi bi-clipboard"></i>
                    Copy

                </button>

            </div>

        </div> --}}


        <!-- Step 3: Verify Setup -->
        {{-- <div class="setup-card">

            <h5 class="section-title">
                <span class="step-number">3</span>
                Verify Setup
            </h5>

            <p class="section-description">
                Enter the six-digit code displayed in your authenticator app
                to confirm that the setup is working.
            </p>

            <form method="POST" action="#">
                @csrf

                <div class="mb-3">
                    <label for="verification_code" class="form-label fw-semibold">
                        Authentication Code
                    </label>

                    <input type="text" class="form-control" id="verification_code" name="verification_code"
                        inputmode="numeric" autocomplete="one-time-code" maxlength="6" placeholder="Enter 6-digit code"
                        required>
                </div>

                <button type="submit" class="btn primary-btn w-100">
                    <i class="bi bi-shield-check me-2"></i>
                    Enable Two-Factor Authentication
                </button>

            </form>

        </div> --}}


        <!-- Recovery Codes -->



        <!-- Footer -->
        <div class="text-center mb-4">

            <a href="{{ url()->previous() }}" class="text-decoration-none text-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Previous

            </a>

        </div>

    </div>
@endsection
