  @extends('admin/ad-layout',['page'=>'type']) 
@section('title') các loại sản phẩm @endsection
@section('content') 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                                @if(Session::has('message'))
                                  <div class="alert alert-success"> {{ Session::get('message') }}</div>
                                @endif
                        <div class="panel-heading">
                            Danh sách sản phẩm hiện có <button class='btn btn-primary' ><a style="color: white" href="{{route('add-type')}}">Thêm mới</a></button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr> <th>stt</th>
                                        <th>id</th>
                                        <th>Tên loại</th>
                                        <th>Chỉnh sửa</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($types as $type)
                                     <tr class="odd gradeX"  style='text-align: center; '>
                                         <td style="vertical-align: middle"></td>
                                        <td style="vertical-align: middle">{{$type->id}}</td>
                                        <td style="vertical-align: middle">{{$type->type_name}}</td>
                                       
                                         <td style="vertical-align: middle" class="center"><a style="font-size: 30px" href="{{route('edit-type',$type->id)}}"><i class="fa fa-edit"></i></a> <a type_id = "{{$type->id}}" class = 'btn-delete' style="font-size: 30px; color: red"><i class="fa fa-times-circle"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <script>
             $(document).ready(function(){
                var cont;
            $(".btn-delete").click(function(){
               var type_id = $(this).attr('type_id');
               console.log(product_id);
               $('.modal-body').html('Bạn thực sự muốn xóa chứ ?');
                $('.modal-footer').html('<button type="button"'+'product_id="'+type_id+'"'+'class="btn btn-default" id="confirm" data-dismiss="modal">Đồng ý</button>  <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>');
                cont=$(this);
            $('#myModal').modal();
      
              });
            $(document).on('click','#confirm',function(){
              var type_id = $(this).attr('product_id');
                var table = $('#dataTables-example').DataTable();
                
                $.ajax({
                   url:"{{route('del-type')}}",
                  type:"POST",
                   dataType:"JSON",
                  data:{
                      'type':type,
                      _token : "{{csrf_token()}}"
                  },
               success:function(data){
                  //nhan data tu controller tra ve
                
                 
              },
              error:function(data){
                alert("Error!!!!!");
                console.log(data);
              }
        

          })
         table.row( cont.parents('tr') ).remove().draw();
            })

                });
            </script>
@endsection