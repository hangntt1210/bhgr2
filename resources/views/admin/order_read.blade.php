@extends('admin.admin')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn hàng
                            <small>Chi tiết</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mã ĐH</label>
                                <div>{{ $detailOrder->id }}</div>
                            </div>
                            <div class="form-group">
                                <label><b class="mr-3">Email người đặt hàng</b></label>
                                <div>{{ $detailOrder->user->email }}</div>
                            </div>
                            <div class="form-group">
                                <label>Ngày Đặt hàng</label>
                                <div>{{ $detailOrder->date_order }}</div> 
                            </div>
                            <div class="form-group">
                                <label>Hình thức thanh toán</label>
                                <div>{{ $detailOrder->payment }}</div> 
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label> 
                                <div>
                                    @if ($detailOrder->status == 1) 
                                        <font color="orange">Chờ xác nhận</font>
                                    @elseif ($detailOrder->status == 2)
                                        <font color="green">Tiếp nhận/ Đang giao</font>
                                    @elseif ($detailOrder->status == 3)
                                        <font color="grey">Đã giao</font>
                                    @else 
                                        <font color="red">Đã hủy</font>
                                    @endif
                                </div>                              
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="your-order-head"><h5>Đơn hàng gồm:</h5></div>

                            <div class="your-order-body" style="padding: 0px 10px">
                                <div class="your-order-item">
                                    <div>
                                        @foreach($listProduct as $li)
                                        <!--  one item   -->
                                        <div class="media">
                                            <img width="25%" src="source/image/product/{{$li->product->image}}" alt="" class="pull-left">
                                            <div class="media-body">
                                                <h6 class="color-black">{{$li->product->name}}</h6>
                                                <h6 class="color-gray">{{$li->quantity}} x {{$li->product->price}} đ</h6>
                                        
                                            </div>
                                        </div>
                                    <!-- end one item -->
                                    @endforeach
                                    
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="your-order-item">
                                    <div class="pull-left"><h5 class="color-black">Tổng tiền: {{ $detailOrder->total }} đ</h5></div>
                                    <div class="pull-right"><h5 class="color-black"></h5></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection