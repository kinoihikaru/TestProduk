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
                    <div class="btn-controls">
                        <div class="btn-box-row row-fluid">
                            <a href="#" class="btn-box big span4"><i class=" icon-random"></i><b>65%</b>
                                <p class="text-muted">
                                    Growth</p>
                            </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b>15</b>
                                <p class="text-muted">
                                    New Users</p>
                            </a><a href="#" class="btn-box big span4"><i class="icon-money"></i><b>15,152</b>
                                <p class="text-muted">
                                    Profit</p>
                            </a>
                        </div>
                    </div>
                    <!--/#btn-controls-->
                </div>
                <!--/.content-->
            </div>
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
@endsection
