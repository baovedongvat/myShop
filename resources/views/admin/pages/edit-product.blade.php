 @extends('admin/ad-layout',['page'=>'edit-product']) 
@section('title') Sửa sản phẩm @endsection
@section('content')

 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">Sửa sản phẩm: {{$product->name}} </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" >
                <div class="col-lg-12" style="padding-left: 250px; padding-right: 250px" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" >
                                    <form role="form" action="{{route('done-edit')}}" method="post" enctype="multipart/form-data">
                                         {{csrf_field()}}
                                            <input  id='product_id' type='hidden' class="form-control" value="{{$product->id}}">
                                           
                                
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input id='name' class="form-control" value="{{$product->name}}" required>
                                            <p class="help-block">Chọn loại mới hoặc để như cũ</p>
                                        </div>
                                          <div class="form-group">
                                            <label>Loại sản phẩm</label>
                                            <select id='type' class="form-control" required>
                                                @foreach ($types as $type)
                                                <option @if ($product->Type->type_name== $type->type_name) selected @endif >{{$type->type_name}}</option>
                                                @endforeach
                                            </select>
                                            <p class="help-block">Sửa tên đi</p>
                                        </div>
                                          <div class="form-group">
                                            <label>Giá tiền sản phẩm</label>
                                            <input id="price" style="width: 20%" value="{{$product->price}}" class="form-control" type="number" min=0 required>
                                            <p class="help-block">Giá tiền sản phẩm</p>
                                        </div>
                                         <div class="form-group">
                                            <label>Số lượng hiện có</label>
                                            <input id="qty" style="width: 20%" value="{{$product->sl_hienco}}" class="form-control" type="number" min=0 required>
                                            <p class="help-block">số lượng hàng</p>
                                        </div>
                                        <input type="hidden" name="main_img" value="{{$product->img}}" id='hidden_img_name'>
                                          <div class="form-group" align="center">
                                            <label style="float: left">Ảnh chính</label>
                                            <div style="padding-top: 30px">
                                            <a data-fancybox="images" href="template/images/products/{{$product->img}}"><img  id='main_img' style="width: 200px; height: 300px;object-fit: scale-down;" src="template/images/products/{{$product->img}}"></a>
                                             </div>
                                              <p class="help-block">Ảnh đang dùng làm đại diện cho sản phẩm</p>
                                        </div>
                                        <div class="form-group" align="center"  style="display: inline-block; position: relative;  ">
                                             <label style="float: left;">Hình minh họa sản phẩm</label>
                                              <div style="padding-top: 30px">
                                           @foreach ($product->Image as $img)
                                           <div  style="float: left; height: 350px; padding-right: 20px" >
                                            <a data-fancybox="images" href="template/images/products/{{$product->img}}"><img  id="img{{$img->id}}" style="width: 200px; height: 300px;object-fit: scale-down;"  src="template/images/products/{{$img->image}}"></a>
                                            <div><a style="cursor: pointer;" id='choose{{$img->image}}' class='choose'> <i style="font-size: 25px; color: green"  class="fa fa-check-circle-o" aria-hidden="true"></i></a></div>
                                            </div>

                                           @endforeach

                                        </div> 
                                    </div>
                                       <div  style="bottom: 0px; padding-left: 250px">
                                      <button type="button" class="btn btn-info" id = 'edit-save'>Lưu thay đổi</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                                                            <!-- Modal -->
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <script>
             $(document).ready(function(){
              $('#edit-save').click(function(){
                $('.modal-title').html('Cẩn thận');
                $('.modal-body').html('Xác nhận lưu thay đổi');
                $('.modal-footer').html('<button id="btn_submit" type="button" class="btn btn-primary" data-dismiss="modal" >Ừ đổi</button> <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>');
                  $('#myModal').modal();
              });
            $(document).on('click','#btn_submit',function(){
               var product_id = document.getElementById('product_id').value;
               var name = document.getElementById('name').value;
               var type = document.getElementById('type').value;
               var img = document.getElementById('hidden_img_name').value;
               var price = document.getElementById('price').value;
               var sl_hienco = document.getElementById('qty').value;
                $.ajax({
               url:"{{route('done-edit')}}",
              type:"POST",
               dataType:"JSON",
              data:{
                  'product_id':product_id,
                  'name':name,
                  
                  'price':price,
                  'qty':sl_hienco,
                  'main_img':img,
                  _token : "{{csrf_token()}}"
              },
               success:function(data){
                  //nhan data tu controller tra ve
                 alert('Đã lưu')
                 window.location.reload();
                 
                 
              },
              error:function(data){
                alert("Error!!!!!");
                console.log(data);
              }

          })
              });
                });
            </script>
@endsection