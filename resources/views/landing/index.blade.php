<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Laravel 9</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/landing/favicon.ico') }}" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/landing/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Produk</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                                <li class="divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                        @else
                            <li class="nav-item"><a class="btn btn-secondary" href="{{ route('login') }}">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Website Sederhana Produk</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Website sederhana ini hanya berisi CRUD user dan produk, website ini juga menampilkan API Language Google Translate terbatas. Proses melakukan request API dapat dilihat di LandingController</p>
                        <a class="btn btn-primary btn-xl" href="{{ route('home') }}">HOME</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Translate Google</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-6 text-center">
                        <div class="mt-5">
                            <div class="form">
                                <label for="source-translate" style="margin-bottom: 30px"></label>
                                <select class="form-select" id="source-translate">
                                    <option></option>
                                    @foreach ($language as $item)
                                        @if ($item->name)
                                            @if ($item->language == 'id')
                                                <option value="{{ $item->language }}" selected>{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->language }}">{{ $item->name }}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form mt-3">
                                <textarea class="form-control" id="translate_input" name="translate_input" type="text" placeholder="" style="height: 10rem"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="mt-5">
                            <div class="form">
                                <label for="target-translate" style="margin-bottom: 10px">Translate</label>
                                <select class="form-select" id="target-translate">
                                    <option></option>
                                    @foreach ($language as $item)
                                        @if ($item->name)
                                            @if ($item->language == 'en')
                                                <option value="{{ $item->language }}" selected>{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->language }}">{{ $item->name }}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form mt-3">
                                <textarea class="form-control" id="translate_output" name="translate_output" type="text" placeholder="Translate" style="height: 10rem"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2022 - Company Name</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script>
            $(document).ready(function(){
                $(document).on('keyup', '#translate_input', function (e){
                    var input = $(this).val();
                    var source = $('#source-translate').val();
                    var target = $('#target-translate').val();

                    $.ajaxSetup({
                        headers : {
                            'X-CSRF-TOKEN' : "{{ csrf_token() }}"
                        },
                    });
                    $.ajax({
                        url: '/translate',
                        type: 'POST',
                        data: {
                            input : input,
                            source : source,
                            target : target,
                        },
                        dataType: 'json',
                        success: function (resp) {
                            if(resp.status == true)
                            {
                                data = resp.data;
                                data.forEach(value => {
                                    $('#translate_output').val(value.translatedText);
                                });
                            }
                        }
                    });
                });
            })

        </script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
