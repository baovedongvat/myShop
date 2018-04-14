 @extends('layout',['page'=>'detail']) 
@section('title') Chi tiết {{$product->Product->name}} @endsection
@section('content')
 
	 
	 
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div  class="col-sm-5">
							<div    class="view-product">
								<img class="fancybox" style=' height: 400px; object-fit: scale-down;' src="template/images/products/{{$product->Product->img}}" alt="" id = 'pic' />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								<?php $a=0; $set=0?>
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner" align="center"   >
										@foreach($imageSet as $image)
										@if($set==0) <div  @if($a==0) <?php $a++ ?> class="item active" @else class= "item" @endif > @endif
										<a style="cursor: pointer;"><img class="fancybox" height="90" width="90" overflow='hidden' class='small'  style="" src="template/images/products/{{$image->image}}"  alt=""></a>
										 <?php $set++ ?>
										 @if($set==2) </div> <?php $set=0; ?> @endif
										@endforeach
										
										@if($set!=0)</div> @endif
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="template/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$product->Product->name}}</h2>
								<p>Mã sản phẩm: {{$product->Product->id}}</p>
								<img src="template/images/product-details/rating.png" alt="" />
								<span>
									<span>{{$product->Product->price}} 000đ</span>
									<label>Quantity:</label>
									<input class='inpQty' type="number" min='1' value="1" max='{{$product->Product->sl_hienco}}' />
									@if($product->Product->sl_hienco > 0)
									<button type="button" class="btn btn-fefault cart add-to-cart" dataID='{{$product->Product->id}}'>
										<i class="fa fa-shopping-cart"></i>
										Đặt hàng
									</button>
									@else
									<button type="button" class="btn btn-fefault cart add-to-cart" dataID=''>
										<i class="fa fa-shopping-cart"></i>
										Hết hàng rồi
									</button>
									@endif
								</span>
								<p><b>Tình trạng:</b>@if($product->Product->sl_hienco > 0) còn hàng @else hết hàng @endif</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p>
								<a href=""><img src="template/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#detail" data-toggle="tab">Mô tả</a></li>
								
								<li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
								<div class="tab-pane fade active in" id="detail" >
								<div class="col-sm-12">
									
									<p>{{$product->Product->detail}}</p>
									
									
								</div>
							</div>
							
						
							
						
							
							<div class="tab-pane fade  in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="template/images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" >
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="template/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="template/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="template/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="template/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="template/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="template/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>

			
	 <script>
 	 $(document).ready(function(){
 	$(".small").click(function(){
  		document.getElementById("pic").src=$(this).attr('src');
 		});
			});
    </script>
  



	@endsection