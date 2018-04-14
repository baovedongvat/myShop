 @extends('layout',['page'=>'cart']) 
@section('title') Trang chủ Shop của thắng @endsection
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>

			@if ($oldcart != null)
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
									<a class="cart_quantity_up qtyChange" dataID = "{{$item['item']->id}}" > + </a>
									<input dataID="{{$item['item']->id}}" class="cart_quantity_input inpID{{$key}}" type="text" name="quantity" value="{{$item['qty']}}" autocomplete="off" size="2">
									<a class="cart_quantity_down qtyChange" dataID = "{{$item['item']->id}}"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price id{{$key}}">{{$item['price']}}</p>
							</td>
							<td class="cart_delete">
								<a dataID = "{{$item['item']->id}}" class="cart_quantity_delete" ><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng giá trong giỏ <span class='carttotal'>{{$oldcart->totalPrice}}</span></li>
							<li>Thuế bậy <span>$2</span></li>
							<li>Tiền ship<span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{route('check-Out')}}">Check Out</a>
					</div>
				</div>
			</div>
			@else 

			@if (Session::has('message'))
				
				<div style="text-align: center; color: orange"> <h1>{{Session::get('message')}}</h1> <img src="template\images\shop\cart.png"></div>
			@else
				<div style="text-align: center; color: orange"> <h1> Có vẻ bạn chưa mua gì, hết tiền à ?</h1> <img src="template\images\shop\cart.png"></div>
				@endif

				@endif
		</div>
	</section><!--/#do_action-->
 <script>
  $(document).ready(function(){
    
     
    $('.cart_quantity_delete').click(function(){
      
      var idFood = $(this).attr('dataId');
      
         console.log(idFood);
     

          $.ajax({
             url:"{{route('delFromCart')}}",
            type:"POST",
             dataType:"JSON",
            data:{
                "idFood":idFood,
                _token : "{{csrf_token()}}"
            },
             success:function(data){
                //nhan data tu controller tra ve
                
               $('.sanpham-'+idFood).hide(500);
               $('.carttotal').html(data.tongDongia)

            },
            error:function(){
                console.log("Error!!!!!");
            }

        })

    })

    $('.cart_quantity_input').keyup( function() { 
    	 if (event.keyCode === 13) {
    		// get the current value of the input field.
    		 var soluong = $(this).val();
    		var idSP = $(this).attr('dataID')
	
		    $.ajax({
		      url:"{{route('updateCart')}}",
		      data:{
		        "qty":soluong,
                "idFood":idSP,
                _token : "{{csrf_token()}}"
		      },
		      type:"POST",
		       dataType:"JSON",
		      success:function(data){
		    	$('.id'+idSP).html(data.giaSp)
		    	  $('.carttotal').html(data.tongDongia)
		      },
		      error:function(){
		          console.log('errrr')
		      }
		    })

			}
});
       $('.qtyChange').click( function() { 
    	var text = $(this).html();
    	var soluong = 1;
      	var idFood = $(this).attr('dataId');
    	if (text == ' + '){ //tăng 1
          $.ajax({
             url:"{{route('addCart')}}",
            type:"POST",
            dataType:"JSON",
            data:{
                "qty":soluong,
                "idFood":idFood,
                _token : "{{csrf_token()}}"
            },
             success:function(data){
                //nhan data tu controller tra ve
               $('.id'+idFood).html(data.giaSp)
               console.log($('.inpID'+idFood).val(data.soluongsp))
               
               
            },
            error:function(){
                console.log("Error!!!!!");
            }

        })
    	}
    	else //giảm 1
    	{
    		soluong=-1
    		  $.ajax({
             url:"{{route('addCart')}}",
            type:"POST",
            dataType:"JSON",
            data:{
                "qty":soluong,
                "idFood":idFood,
                _token : "{{csrf_token()}}"
            },
             success:function(data){
                //nhan data tu controller tra ve
               $('.id'+idFood).html(data.giaSp)
               console.log($('.inpID'+idFood).val(data.soluongsp))
               
               
            },
            error:function(){
                console.log("Error!!!!!");
            }

        })
    	}
    	console.log(text)
});
  });
</script>
@endsection