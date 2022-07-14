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
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="btn-controls">
                        <div class="btn-box-row row-fluid">
                            <a href="{{ route('translate-api.index') }}" class="btn-box big span4"><i class=" icon-bold"></i><b>{{ $totalApi }}</b>
                                <p class="text-muted">Total API Google Translate</p>
                            </a><a href="{{ route('user.index') }}" class="btn-box big span4"><i class="icon-user"></i><b>{{ $totalUser }}</b>
                                <p class="text-muted">Total User</p>
                            </a><a href="{{ route('produk.index') }}" class="btn-box big span4"><i class="icon-inbox"></i><b>{{ $totalProduk }}</b>
                                <p class="text-muted">Total Produk</p>
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
