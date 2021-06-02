@extends('layouts.app')

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container-fluid">
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
					<form action="{{route('order', $product->id)}}" method="POST">
					@csrf 
					@method('PATCH')
					<input class="product-title" name="nameproduct"value="{{$product->nameproduct}}">
					<div class="product-desc">{{$product->description}}</div>
					<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
					<label style=""for="">Rp. </label>
					<input class="product-price" name="price"value={{$product->price}}>
					@if($product->qty>0)
					<div class="product-stock">In Stock : {{$product->qty}}</div>
					<hr>
					
					<div class="mb-3">
                    	<input class="form-control" name="amount" type="number" placeholder="Enter Amount">
               		 </div>
						@if (session('error'))
                        <div class="alert alert-danger text-red-400">{{ session('error') }}</div>
                    @endif
					<div class="btn-group cart">
						<button type="submit" class="btn btn-success">
							Buy Item  
						</button>
					</div>
					@else
					<div class="product-out">Out of Stock</div>
					@endif
					</form>
			
				</div>
			</div> 
		</div>
	</div>
</div>

@endsection
