@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chi tiết sản phẩm<!--Sản phẩm: {{$sanpham->name}}--></h6>
			</div>
			<div class="pull-right">
				
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
								<br>
								<p class="single-item-price">
									@if($sanpham->promotion_price == 0)<!--neu sp ko khuyenmai-->
												<span class="flash-sale">{{$sanpham->price}}đ</span>
											@else<!--sp co khuyenmai-->
												<span class="flash-del">{{$sanpham->price}}đ</span>
												<span class="flash-sale">{{$sanpham->promotion_price}}đ</span>
											@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>
								</p>
							</div>
							<div class="space20">&nbsp;</div>

<!--bo chon so luong							<p>chọn số lượng:</p> -->
<p>cho vào giỏ hàng:</p>
							<div class="single-item-options">
						
								<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
						</ul>
						<div class="panel" id="tab-description">
							Kích thước dài x rộng x cao: {{$sanpham->length}}x{{$sanpham->width}}x{{$sanpham->height}} (cm)
							<br>
							{{$sanpham->description}}
						</div>						
					</div>

					
					

<!--				<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">

							@foreach($sp_tuongtu as $sp)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="source/image/product/{{$sp->image}}" alt="">           
                                        <ul>
                                            <li class="quick-view"><a onclick="" href="{{route('chitietsanpham',$sp->id)}}">Chi tiết</a></li>
                                            <li class="w-icon"><a href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        
                                        <a href="{{route('chitietsanpham',$sp->id)}}">
                                            <h5>{{$sp->name}}</h5>
                                        </a>
                                        <div class="product-price">
                                            {{number_format($sp->price)}}₫
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
							
						</div>-->

						<h4>So sánh với một số sản phẩm tương tự:</h4>						

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
			                <thead>
			                    <tr align="center">
			                        <th>Hình ảnh</th>
			                        @foreach($sp_tuongtu as $sp)
			                        <th>
			                        	<a href="{{route('chitietsanpham',$sp->id)}}">
			                        		<img src="source/image/product/{{$sp->image}}" alt="" style="width:100px;height:100px;">
			                        	</a>
			                        </th>
			                        @endforeach
			                    </tr>
			                </thead>
			                <tbody>
			                	<tr>
			                        <th>Tên sản phẩm</th>
			                        @foreach($sp_tuongtu as $sp)
			                        <td>{{$sp->name}}</td>
			                        @endforeach
			                    </tr>
			                    <tr>
			                        <th>Kích thước</th>
			                        @foreach($sp_tuongtu as $sp)
			                        <td>{{$sp->length}} x {{$sp->width}} x {{$sp->height}}(cm)</td>
			                        @endforeach
			                    </tr>
			                    <tr>
			                        <th>Chất liệu</th>
			                        @foreach($sp_tuongtu as $sp)
			                        <td>{{$sp->material->name}}</td>
			                        @endforeach
			                    </tr>
			                    <tr>
			                        <th>Giá tiền</th>
			                        @foreach($sp_tuongtu as $sp)
			                        <td>{{$sp->price}}đ</td>
			                        @endforeach
			                    </tr>
			                    <tr>
			                    	<th></th>
			                    	@foreach($sp_tuongtu as $sp)
			                    	<td>
			                    		<div class="text-center">
			                    			<a href="{{route('chitietsanpham',$sp->id)}}">
			                    				<button class="beta-btn primary">Chi tiết <i class="fa fa-chevron-right"></i></button>
			                    			</a>
			                    		</div>
			                    	</td>
			                    	@endforeach
			                    </tr>
			                </tbody>
			            </table>			            
					</div> <!-- .beta-products-list -->

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Đánh giá ({{ count($item) }})</a></li>
						</ul>
						<div class="panel" id="tab-description">
							@foreach($item as $item)
							<div class="panel" id="tab-description">
								<b>{{ $item->orders->user->email }}</b>
								{{ $item->cmt }}
							</div>
							@endforeach
						</div>		
					</div>

				</div>				
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection