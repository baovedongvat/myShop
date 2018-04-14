 @extends('admin/ad-layout',['page'=>'add-type']) 
@section('title') Thêm loại sản phẩm @endsection
@section('content')

 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">Thêm loại sản phẩm</h1>
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
                                    <form role="form" action="{{route('done-add-type')}}" method="post" enctype="multipart/form-data">
                                         {{csrf_field()}}
                                    <input id='type_id' class="form-control" name='type_id' required type="hidden">
                                           
                                
                                        <div class="form-group">
                                            <label>Tên Loại</label>
                                            <input id='name' class="form-control" name="type_name" required>
                                            <p class="help-block">...</p>
                                        </div>
    
                                        
                              
                                       
                                        </div>
                                  
                                       <div  style="bottom: 0px; padding-left: 250px">
                                      <button type="submit" class="btn btn-info" id = 'edit-save'>Lưu thay đổi</button>
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
          
@endsection