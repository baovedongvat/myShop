 @extends('admin/ad-layout',['page'=>'edit-type']) 
@section('title') Sửa Loại sản phẩm @endsection
@section('content')

 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">Sửa loại: {{$type->type_name}} </h1>
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
                                    <input id='type_id' class="form-control" value="{{$type->id}}" required type="hidden">
                                           
                                
                                        <div class="form-group">
                                            <label>Tên Loại</label>
                                            <input id='name' class="form-control" value="{{$type->type_name}}" required>
                                            <p class="help-block">Chọn loại mới hoặc để như cũ</p>
                                        </div>
    
                                          <div class="form-group">
                                            <label>Giá tiền sản phẩm</label>
                                            <input id="price" style="width: 20%" value="" class="form-control" type="number" min=0 required>
                                            <p class="help-block">Giá tiền sản phẩm</p>
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
               var type_id = document.getElementById('type_id').value;
              
               var name = document.getElementById('name').value;

                $.ajax({
               url:"{{route('post-edit-type')}}",
              type:"POST",
               dataType:"JSON",
              data:{
                  'type_id':type_id,
                  'name':name,
  
                  _token : "{{csrf_token()}}"
              },
               success:function(data){
                  //nhan data tu controller tra ve
                 alert('Đã lưu')
                 window.location.reload();
                 
                 
              },
              error:function(data){
                  alert('error');
                  console.log(data);
              }

          })
              });
                });
            </script>
@endsection