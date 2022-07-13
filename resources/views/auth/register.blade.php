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
                        <li><a href="{{ route('login') }}">
                            Login
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
                    <div class="alert alert-danger" role="alert">
                        <div class="text-red-400 fw-bold fs-4">{{ session('error') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="form-vertical" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="module-head">
                        <h3>Register</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12 @error('name') is-invalid @enderror" type="text" name="name" placeholder="Nama" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                            </div>
                        </div>

                    </div>
                    <div class="module-foot">
                        <div class="control-group">
                            <div class="controls clearfix">
                                <button type="submit" class="btn btn-primary pull-right">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
