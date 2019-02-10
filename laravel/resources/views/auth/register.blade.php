@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="py-4">Sign up</h1>
        <form class="mt-4 mb-4" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputUsername">Username</label>
                <input name="username" type="text" class="form-control" id="exampleInputUsername" aria-describedby="usernameHelp"
                       placeholder="example123">
                <small id="usernameHelp" class="form-text text-muted">Alphanumeric characters only
                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputFullname">Full name</label>
                <input name="fullname" type="text" class="form-control" id="exampleInputFullname" aria-describedby="fullnameHelp"
                       placeholder="John Doe">
                <small id="fullnameHelp" class="form-text text-muted">Alphanumeric characters only
                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="example@example.com">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else
                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="*******"
                       aria-describedby="passwordHelp1">
                <small id="passwordHelp1" class="form-text text-muted">More than 5 characters, please
                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Re-enter password</label>
                <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword2" placeholder="*******"
                       aria-describedby="passwordHelp2">
                <small id="passwordHelp2" class="form-text text-muted">Passwords have to match
                </small>
            </div>
            <input type="hidden" name="roles" value="ROLE_USER">
            <button type="submit" class="btn btn-primary btn-sm">Sign up</button>
        </form>
    </div>

    {{--<div class="container">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="col-md-8">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header">{{ __('Register') }}</div>--}}

                    {{--<div class="card-body">--}}
                        {{--<form method="POST" action="{{ route('register') }}">--}}
                            {{--@csrf--}}

                            {{--<div class="form-group row">--}}
                                {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="name" type="text"--}}
                                           {{--class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"--}}
                                           {{--name="name" value="{{ old('name') }}" required autofocus>--}}

                                    {{--@if ($errors->has('name'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row">--}}
                                {{--<label for="email"--}}
                                       {{--class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="email" type="email"--}}
                                           {{--class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}}
                                           {{--name="email" value="{{ old('email') }}" required>--}}

                                    {{--@if ($errors->has('email'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row">--}}
                                {{--<label for="password"--}}
                                       {{--class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="password" type="password"--}}
                                           {{--class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"--}}
                                           {{--name="password" required>--}}

                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row">--}}
                                {{--<label for="password-confirm"--}}
                                       {{--class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="password-confirm" type="password" class="form-control"--}}
                                           {{--name="password_confirmation" required>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row mb-0">--}}
                                {{--<div class="col-md-6 offset-md-4">--}}
                                    {{--<button type="submit" class="btn btn-primary">--}}
                                        {{--{{ __('Register') }}--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
