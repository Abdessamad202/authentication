<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Verification Code</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Enter Verification Code</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verify.code') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="verificationCode" class="form-label">8-Digit Verification Code</label>
                                <input type="text" class="form-control" id="verificationCode"
                                    name="verification_code" placeholder="Enter 8-digit code" maxlength="8" required>
                                @if ($errors->has('verification_code'))
                                    <span class="text-danger">{{ $errors->first('verification_code') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional, for features like modals or alerts) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
