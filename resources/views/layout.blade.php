 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
     <base href="{{asset('')}}">
    <link href="template/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/css/font-awesome.min.css" rel="stylesheet">
    <link href="template/css/prettyPhoto.css" rel="stylesheet">
    <link href="template/css/price-range.css" rel="stylesheet">
    <link href="template/css/animate.css" rel="stylesheet">
	<link href="template/css/main.css" rel="stylesheet">
	<link href="template/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="template/js/html5shiv.js"></script>
    <script src="template/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="template/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="template/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="template/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="template/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="template/images/ico/apple-touch-icon-57-precomposed.png">
<!--img modal -->
<link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
<style type="text/css">
    a.fancybox img {
        border: none;
        box-shadow: 0 1px 7px rgba(0,0,0,0.6);
        -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
    } 
    a.fancybox:hover img {
        position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
    }
</style>
<!--img modal -->

</head><!--/head-->

<body>
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thông báo của shop</h4>
      </div>
      <div class="modal-body">
         <p>Đã thêm <b><span id="namefood">Sản phẩm a</span></b> vào giỏ hàng</p>
      </div>
      <div style="text-align: center" class="modal-footer">
        <button  type="button" class="btn btn-default" data-dismiss="modal">Biết rồi</button>
      </div>
    </div>

  </div>
</div>
 
	@include('header')

    @if ($page == 'home')
        @include('home-slider')
    @endif

	  <div class="container">

            <div class="row">
             <section>
                @if ($page != 'cart' && $page != 'checkout' )
                 @include('sidebar')
                 @endif
	@yield('content')
            </section>
            </div>
        </div>
	@include('footer')
	

  
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script> -->
    <script src="template/js/jquery.js"></script>
	<script src="template/js/price-range.js"></script>
    <script src="template/js/jquery.scrollUp.min.js"></script>
	<script src="template/js/bootstrap.min.js"></script>
    <script src="template/js/jquery.prettyPhoto.js"></script>
    <script src="template/js/main.js"></script>
<!--img modal -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>
<!--img modal -->
</body>
 <script  type="text/javascript">
$(document).ready(function() {
    $("#B").trigger('click');
     $("#A").trigger('click');

});
</script>
<script>
  function ajaxAddCart(qty,idFood){
      $.ajax({
        dataType:"JSON",
             url:"{{route('addCart')}}",
            type:"POST",
            data:{
                "qty":qty,
                "idFood":idFood,
                _token : "{{csrf_token()}}"
            },
             success:function(data){
                //nhan data tu controller tra ve
                console.log(data);
                $('#namefood').html(data.name)
                $('#myModal').modal('show')

               
            },
            error:function(){
                console.log("Error!!!!!");
            }

        })

  }
</script>
 <script>
  $(document).ready(function(){
    
     
    $('.add-to-cart').click(function(){
      var soluong = 1;
      var idFood = $(this).attr('dataId');
      
         console.log(soluong);
         console.log(idFood);
         if ($(".inpQty")[0]){
               ajaxAddCart($('.inpQty').val(),idFood);
          } else {
              ajaxAddCart(soluong,idFood);
          }
    })
   $('.image-small').click(function(){
             $(this).css('width', function(_ , cur){
                  return cur === '100px' ? '100%' : '100px'
            });  
        });
  });
</script>

</html>