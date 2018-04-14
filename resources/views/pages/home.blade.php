 @extends('layout',['page'=>'home']) 
@section('title') Trang chủ Shop của thắng @endsection
@section('content')

	
	 
      
               
                </div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items" ><!--features_items-->
						<h2 style="font-size: 20px" class="title text-center">Hàng mới về</h2>
						@foreach($featured_products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											
											<img  src="template/images/products/{{$product->img}}" alt="" style="height: 220.26px;object-fit: scale-down;" />
											
											<h2>${{$product->price}}</h2>
											<p>{{$product->name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>${{$product->price}}</h2>
												<p>{{$product->name}}</p>
												<a href="javascript:void(0)" class="btn btn-default add-to-cart" dataId="{{$product->id}}" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
						{{ $featured_products->links() }}
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<h2 style="font-size: 20px" class="title text-center">Mặt hàng tiêu biểu</h2>
							<ul class="nav nav-tabs">
								<?php $a=0; $str=array();?>
								@foreach ($categories as $cate)
								
									<?php $str[$cate->id] ='<div class="tab-pane fade active in" id="'.$cate->id.'" >'.'<div align="center" style="color:orange;   font-weight:bold;   padding-bottom: 15px;" ><a href="cat-detail/'.$cate->TypeUrl->url.'"style="color:orange" >Xem thêm sản phẩm '.$cate->type_name.'</a></div>' ;?>

								<li @if($a==0)  class="active" <?php $a++ ?> @endif ><a <?php $s=$cate->type_name; ?> href="#{{$cate->id}}" id = "<?= $s ?>" data-toggle="tab">{{$cate->type_name}}</a></li>
								@endforeach

							</ul>
						</div>
						<div class="tab-content">
							@foreach ($products as $product)
								<?php $str[$product->id_type] .='<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img style="height: 200px; object-fit: scale-down;" src="template/images/products/'.$product->img.'" alt="" />
												<h2>'.$product->price.'</h2>
												<p>'.$product->name.'</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>' ?>
							@endforeach 
							@foreach($str as $item)
								 <?php $item .='</div>'?>
								<?= $item?>
									
							@endforeach
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 style="font-size: 20px"  class="title text-center">Hàng bán chạy</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="template/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
			
	
	@endsection