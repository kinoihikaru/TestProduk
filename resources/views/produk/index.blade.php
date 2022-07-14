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
                        @if (session()->has('error'))
                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('error') }}
                            </div>
                        @elseif(session()->has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="module-head">
                            <h3>Produk</h3>
                            <a class="btn btn-primary" href="{{ route('produk.create') }}" style="margin-top:10px">Tambah Produk</a>
                        </div>
                        <div class="module-body table">
                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Pemilik Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr class="odd gradeX">
                                            <td><a href="/produk/{{ $item->id }}">{{ $item->nama }}</a></td>
                                            <td>{{ $item->harga }}</td>
                                            <td>{{ $item->pemilik }}</td>
                                            <td>
                                                <a class="badge" href="/produk/{{ $item->id }}/edit"><i class="icon-edit"></i></a>
                                                <form action="/produk/{{ $item->id }}" method="POST" style="display: inline-block">
                                                    @method('delete')
                                                    @csrf
                                                    <button onclick="return confirm('Apakah anda ingin menghapus?')" class="badge" style="border: 0"><i class="icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>TOTAL HARGA</th>
                                        <th>{{ $totalHarga->total }}</th>
                                    </tr>
                                </tfoot>
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
