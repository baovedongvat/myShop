 @extends('layout',['page'=>'checkout']) 
@section('title') Trang chủ Shop của thắng @endsection
@section('content')
		<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->
@if (Session::has('message'))
				
				<div style="text-align: center; color: orange"> <h1>{{Session::get('message')}}</h1> <img src="template\images\shop\cart.png"></div>
			
				@endif
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-8">
						<div class="shopper-info form-group">
							<p>Shopper Information</p>
							<form action="{{route('checkOut')}}" method="post" class="form-horizontal">
								 {{csrf_field()}}
								<input type="text"  name='name' placeholder="Họ tên" required  >
								<input type="email" name = 'email' placeholder="Email"  required >
								<input type="text" name='address' placeholder="Địa chỉ"  required >
								
								<input type="tel" name='tel' placeholder="Số điện thoại"  required >
							
							<div style="text-align: center"><button type="submit"  class="btn btn-primary">Đặt hàng</button></div>
							
						</div>
					</div>
				
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							
							<label><input type="checkbox"> Shipping to bill address</label>
							</form>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
						@foreach($oldcart->items as $key=>$item)
						<tr class="sanpham-{{$item['item']->id}}">
							<td class="cart_product" align="center">
								<a  href=""><img  style="max-height: 250px" src="template/images/products/{{$item['item']->img}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$item['item']->name}}</a></h4>
								<p>ID sản phẩm: {{$key}}</p>
							</td>
							<td class="cart_price">
								<p>{{$item['item']->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<input dataID="{{$item['item']->id}}" class="cart_quantity_input inpID{{$key}}" type="text" name="quantity" value="{{$item['qty']}}" autocomplete="off" size="2">
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price id{{$key}}">{{$item['price']}}</p>
							</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
@endsection