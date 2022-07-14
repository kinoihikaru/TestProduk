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
                            <h3>Edit Produk</h3>
                        </div>
                        <div class="module-body">

							<form action="/produk/{{ $data->id }}" method="POST" class="form-horizontal row-fluid">
                                @csrf
                                @method('PUT')
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Nama Produk</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" name="nama" class="span8 @error('name') is-invalid @enderror" value="{{ old('nama', $data->nama) }}">
                                        @error('nama')
                                            <span class="help-inline" style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Harga</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">#</span><input name="harga" class="span8 @error('harga') is-invalid @enderror" type="text" value="{{ old('harga', $data->harga) }}">
                                            @error('harga')
                                                <span class="help-inline" style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Pemilik Produk</label>
                                    <div class="controls">
                                        <select tabindex="1" class="span8" name="user_id">
                                            <option></option>
                                            @foreach ($user as $item)
                                                @if (old('user_id', $data->user_id) == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('user_id')
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
