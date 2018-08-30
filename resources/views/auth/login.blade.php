@extends('layouts.public')

@section('content')
<div class="jumbotron jumbotron-header">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="well">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3>Login</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-sm-4 control-label">E-Mail Address</label>
                  <div class="col-sm-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-6">
                    <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-6 col-sm-offset-4">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4">
                    <button type="submit" class="btn btn-info">
                      Login
                    </button>
                    <a class="btn btn-link text-link" href="{{ route('password.request') }}">
                      Forgot Your Password?
                    </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
