@extends('layouts.adminapp')

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@foreach($products as $product)
<div class="container-fluid mb-5">
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">	
				<div class="col-md-12">
					<div class="product col-md-3 service-image-left">
                    
						<center>
							<img class="custom-img"id="item-display" src="{{asset('storage/image/'.$product->image)}}" alt=""></img>
						</center>
					</div>
					
				</div>
					
				<div class="col-md-7">
					<div class="product-title">{{$product->nameproduct}}</div>
					<div class="product-desc">{{$product->description}}</div>
					<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
					<div class="product-price">Rp. {{$product->price}},00</div>
					<div class="product-stock">Stock : {{$product->qty}}</div>
					<hr>
                    <form action="{{route('editproduct',$product->id)}}">
                    <div class="btn-group cart mb-3">
						<button type="submit" class="btn btn-success">
							Edit Item  
						</button>
					</div>
                    </form> 
					
                    <div class="btn-group cart">
					<form action="{{route('delproduct',$product->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
						<button type="submit" class="btn btn-danger">
							Delete Item
						</button>  </form>
					</div>
                  
                    
			
				</div>
			</div> 
		</div>
	</div>
</div>
@endforeach

<a href="{{route('creproduct')}}" class="btn btn-primary mt-5" style="display: block; margin:auto; width: 80%">Create Product</a>
<a href="{{route('crecategory')}}" class="btn btn-primary mt-2" style="display: block; margin:auto; width: 80%">Create Category</a>

@endsection
