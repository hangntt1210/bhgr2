@extends('admin.admin')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Chỉnh sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('update_product', $productEdit->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label>Sản phẩm</label>
                                <input class="form-control" name="name" value="{{ $productEdit->name }}" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label><b class="mr-3">Phân loại</b></label>
                                <i>{{ $productEdit->type->name }}</i> sửa là
                                
                            </div>
                            <div class="form-group">
                                <label>Chất liệu</label>
                                <i>{{ $productEdit->material->name }}</i> sửa là
                                
                            </div>
                            <div class="form-group">
                                <label>Giá tiền</label>
                                <input class="form-control" name="price" value="{{ $productEdit->price }}" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mại</label>
                                <input class="form-control" name="promotion_price" value="{{ $productEdit->promotion_price }}" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" name="quantity" value="{{ $productEdit->quantity }}" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3" name="description" >{{ $productEdit->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection