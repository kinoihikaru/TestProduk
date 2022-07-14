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
                            <h3>Google Translate Languages</h3>
                        </div>
                        <div class="module-body table">
                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                <thead>
                                    <tr>
                                        <th>language</th>
                                        <th>name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr class="odd gradeX">
                                            <td>{{ $item['language'] }}</td>
                                            <td>{{ $item['name'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!--/.module-->
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
