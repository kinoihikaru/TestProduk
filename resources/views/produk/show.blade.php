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
                            <h3>User</h3>
                        </div>
                        <div class="module-body">
                            <table class="table">
                              <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Pemilik Produk</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->harga }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>
                                        <a class="badge" href="/produk/{{ $data->id }}/edit"><i class="icon-edit"></i></a>
                                        <form action="/produk/{{ $data->id }}" method="POST" style="display: inline-block">
                                            @method('delete')
                                            @csrf
                                            <button onclick="return confirm('Apakah anda ingin menghapus?')" class="badge" style="border: 0"><i class="icon-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
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
