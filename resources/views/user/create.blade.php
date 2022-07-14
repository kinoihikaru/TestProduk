@extends('layouts.app')

@section('navbar')
    @include('layouts.partials.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.partials.sidebar')

            <div class="span9">
                <div class="content">

                    <div class="module">
                        <div class="module-head">
                            <h3>Tambah User</h3>
                        </div>
                        <div class="module-body">

                            <form class="form-horizontal row-fluid" action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label" for="name">Nama</label>
                                    <div class="controls">
                                        <input type="text" id="name" class="span8 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
										@error('name')
                                            <span class="help-inline" style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="email">Email</label>
                                    <div class="controls">
                                        <input type="text" id="email" class="span8 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="help-inline" style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="password">Password</label>
                                    <div class="controls">
                                        <input type="text" id="password"  class="span8 @error('password') is-invalid @enderror" name="password" required>
                                        @error('password')
                                            <span class="help-inline" style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Submit Form</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.datatable-1').dataTable();
            $('.dataTables_paginate').addClass("btn-group datatable-pagination");
            $('.dataTables_paginate > a').wrapInner('<span />');
            $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
            $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
        } );
    </script>
@endsection
