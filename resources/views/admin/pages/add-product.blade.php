 @extends('admin/ad-layout',['page'=>'add-product']) 
@section('title') Thêm sản phẩm @endsection
@section('content')

 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">Thêm sản phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" >
                <div class="col-lg-12" style="padding-left: 300px; padding-right: 300px" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{route('post-add-product')}}" method="post" enctype="multipart/form-data">
                                         {{csrf_field()}}
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input name='name' class="form-control" required>
                                            <p class="help-block">Tên sẽ hiển thị trên trang bán hàng</p>
                                        </div>
                                          <div class="form-group">
                                            <label>Loại sản phẩm</label>
                                            <select name='type' class="form-control" required>
                                                @foreach ($types as $type)
                                                <option>{{$type->type_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                          <div class="form-group">
                                            <label>Giá tiền sản phẩm</label>
                                            <input name="price" style="width: 20%" class="form-control" type="number" min=0 required>
                                            <p class="help-block">Giá tiền sản phẩm</p>
                                        </div>
                                         <div class="form-group">
                                            <label>Số lượng hiện có</label>
                                            <input name="qty" style="width: 20%" class="form-control" type="number" min=0 required>
                                            <p class="help-block">số lượng hàng</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh sản phẩm</label>
                                            <input name="image[]" multiple='true' type="file" accept=".jpg,.gif,.png">
                                             <p class="help-block">Xin chọn ảnh muốn đặt làm đại diện đầu tiên khi upload</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả sản phẩm</label>
                                            <textarea name="description" class="form-control" rows="3" required></textarea>
                                        </div>
                                       
                                        
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
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