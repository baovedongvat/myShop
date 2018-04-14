

<p>Xin chào {{$human->name}}</p>

<p>Các sản phẩm bạn đã đặt mua </p>
<p>id		|| Tên											|| Số lượng || giá tiền</p>
@foreach($oldcart->items as $key=>$item)

<p>{{$key}} 		{{$item['item']->name}} 								{{$item['qty']}} 		{{$item['item']->price}}</p>

@endforeach

<p>Tổng tiền : {{$item['price']}} đồng</p>

link confirm: https://localhost/myShop/confirm/{{$bill->token}}/{{$bill->token_date}}