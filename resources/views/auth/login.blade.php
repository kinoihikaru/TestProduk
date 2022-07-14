@extends('layouts.app')

@section('navbar')
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i>
                </a>
                <a class="brand" href="{{ route('landing') }}">
                    Landing
                </a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav pull-right">
                        <li><a href="{{ route('register') }}">
                            Register
                        </a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="module module-login span4 offset4">
                @if (session()->has('error'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('error') }}
                </div>
                @endif
                <form class="form-vertical" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="module-head">
                        <h3>Login</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="help-inline" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                                @error('password')
                                    <span class="help-inline" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="module-foot">
                        <div class="control-group">
                            <div class="controls clearfix">
                                <button type="submit" class="btn btn-primary pull-right">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
