 @extends('layout',['page'=>'detail']) 
@section('title') Trang chi tiết   @endsection
@section('content')

	
	 
      
               
             </div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Các mặt hàng {{$cats->Type->type_name}}</h2>
						@foreach ($products as $product)
						<div class="col-sm-4" >
							<div class="product-image-wrapper" >
								<div  class="single-products">
										<div   class="productinfo text-center">
											<img style=' height: 200px; object-fit: scale-down;'  src="template/images/products/{{$product->img}}" alt="" />
											<h2>{{$product->price}}</h2>
											<p>{{$product->name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$product->price}}</h2>
											<p>{{$product->name}}</p>
												<ahref="javascript:void(0)" class="btn btn-default add-to-cart" dataId="{{$product->id}}"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="detail/{{$product->ProductUrl->url}}"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li> 
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						
					</div><!--features_items-->
					
				
					
				</div>
	
	@endsection