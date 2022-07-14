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
                            <h3>Forms</h3>
                        </div>
                        <div class="module-body">

							<form action="{{ route('produk.store') }}" method="POST" class="form-horizontal row-fluid">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Basic Input</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" placeholder="Type something here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Prepended Input</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">#</span><input class="span8" type="text" placeholder="prepend">
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Dropdown</label>
                                    <div class="controls">
                                        <select tabindex="1" data-placeholder="Select here.." class="span8">
                                            <option></option>

                                        </select>
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
