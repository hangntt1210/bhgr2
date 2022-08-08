@extends('admin.admin')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('store_product') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Sản phẩm</label>
                                <input class="form-control" name="name" placeholder="tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label><b class="mr-3">Phân loại</b></label>
                                <select name="id_type">
                                    @foreach($loai_sp as $loai)
                                        <option value="{{ $loai->id }}">{{ $loai->name }}</option>
                                    @endforeach  
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chất liệu</label>
                                <select name="id_material">
                                    @foreach($loai_chatlieu as $loai)
                                        <option value="{{ $loai->id }}">{{ $loai->name }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Giá tiền</label>
                                <input class="form-control" name="price" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mại</label>
                                <input class="form-control" name="promotion_price" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" name="quantity" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>

                            <button type="submit" class="btn btn-default">Thêm</button>
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