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
<body style="background-image: linear-gradient(to right, #99bbff,indigo,violet)">
@if (\Session::has('error'))
    <div class="alert alert-danger">
        
            {!! \Session::get('error') !!}
    
    </div>
@endif
    <div class="container">
    <h1 class="text-center text-white mt-3">Update Product Data</h1>
        <div class ="d-flex align-items-center justify-content-center " style="min-height: 80vh">
    
            <form class="col-lg-6 " action="{{route('upproduct', $product->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="" class="form-label text-white">Product's Name</label>
                    <input class="form-control" name="nameproduct" type="text" placeholder="Enter Product's Name" value={{$product->nameproduct}}>
                </div>
                 <div class="mb-3">
                    <label for="" class="form-label text-white">Product's Category</label>
                    <select name="category_id" class="form-control" id="" placeholder="Select Category">
                        @foreach($categories as $category)
                            <option value="" selected disabled hidden></option>
                            <option value="{{$category->id}}">{{$category->category_product}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white">Quantity of Product</label>
                    <input class="form-control " name="qty" type="number" placeholder="Enter Quantitiy of Product"value={{$product->qty}}>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white">Product's Price</label>
                    <input class="form-control" name="price" type="number" placeholder="Enter Product's Price"value={{$product->price}}>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white">Product's Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Enter Product's Description">{{$product->description}}</textarea>
                </div>
                
                
                <button type="submit" class="btn btn-success" style="width:100%">Update</button>
            </form>

        </div>
    </div>

</body>
</html>