<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>XYZ Company</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-image: linear-gradient(to right, grey,orange, #ffcc00)">
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin') }}">
                 Admin Panel
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Administrator <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">

    <h1 class="text-center text-white mt-5">Create Product Data</h1>
        <div class ="d-flex align-items-center justify-content-center " style="min-height: 80vh">
    
            <form class="col-lg-6" action="{{route('createproduct')}}" method="POST"  enctype = "multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label text-white">Product's Name</label>
                    <input class="form-control" name="nameproduct" type="text" placeholder="Enter Product's Name">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white">Product's Category</label>
                    <select name="category_id" class="form-control" id="" placeholder="Select Category">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_product}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white">Product's Quantity</label>
                    <input class="form-control" name="qty" type="number" placeholder="Enter Product's Quantitiy">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white">Product's Price</label>
                    <input class="form-control" name="price" type="number" placeholder="Enter Product's Price">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white">Product's Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Enter Product's Description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white">Insert Product's Image</label>
                    <input class="form-control-file" name="image" type="file" placeholder="">
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%">Create</button>
            </form>

        </div>
    </div>
</body>