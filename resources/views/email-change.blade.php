<!-- resources/views/auth/change-email.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Change Email Address</h2>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('email.change') }}" method="POST">
        @csrf

        <!-- New Email Address -->
        <div class="form-group">
            <label for="new_email">New Email Address</label>
            <input type="email" id="new_email" name="new_email" class="form-control" required value="{{ old('new_email') }}">
        </div>

        <!-- Confirm New Email Address -->
        <div class="form-group mt-3">
            <label for="confirm_new_email">Confirm New Email Address</label>
            <input type="email" id="confirm_new_email" name="confirm_new_email" class="form-control" required>
        </div>

        <!-- Password for Confirmation -->
        <div class="form-group mt-3">
            <label for="password">Current Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update Email</button>
    </form>
</div>
@endsection
