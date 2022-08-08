@extends('admin.admin')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Chi tiết</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                            <div class="form-group">
                                <label>Sản phẩm</label>
                                <div>{{ $detailProduct->name }}</div>
                            </div>
                            <div class="form-group">
                                <label><b class="mr-3">Phân loại</b></label>
                                <div>{{ $detailProduct->type->name }}</div>
                            </div>
                            <div class="form-group">
                                <label>Chất liệu</label>
                                <div>{{ $detailProduct->material->name }}</div> 
                            </div>
                            <div class="form-group">
                                <label>Giá tiền</label>
                                <div>{{ $detailProduct->price }}</div>
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mại</label>
                                <div>{{ $detailProduct->promotion_price }}</div>
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <div>{{ $detailProduct->quantity }}</div>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <div>{{ $detailProduct->description }}</div>
                            </div>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection