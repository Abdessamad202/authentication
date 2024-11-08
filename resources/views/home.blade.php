@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('password'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('password') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->email_verified_at === null)
            <div class="row justify-content-center mt-3 align-items-center">
                <div class="col-3">
                    you are not verifying your email
                </div>
                <div class="col-2">
                    <button type="button" class=" btn btn-primary fw-bold" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@mdo">verify from here</button>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form method="POST" action="{{route("email.send")}}">
                    @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add your password to make this action</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Password</label>
                                    <input type="password" name="password" class="form-control" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="row justify-content-center mt-3 align-items-center">
                <div class="col-4">
                    your mail is verified at {{ auth()->user()->email_verified_at }}
                </div>
            </div>
        @endif
    </div>
@endsection
