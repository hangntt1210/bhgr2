@extends('master')
@section('content')	
	
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
<!--					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span> -->
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
<!--					@if(Session::has('thongbao')) {{Session::get('thongbao')}} @endif -->
					@if(Session::has('thongbao'))
						<div class="alert alert-success"><h3>{{Session::get('thongbao')}}</h3></div>
					@endif
				</div>
				<div class="row">
					
					<div class="col-sm-6">
						
							<div class="your-order-head"><h5>Đơn hàng gồm:</h5></div>

							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
										@if(Session::has('cart'))
										@foreach($product_cart as $cart)
										<!--  one item	 -->
										<div class="media">
											<img width="25%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<h6 class="color-black">{{$cart['item']['name']}}</h6>
												<h6 class="color-gray">{{$cart['qty']}} x {{number_format($cart['pricee'])}} đ</h6>
										
											</div>
										</div>
									<!-- end one item -->
									@endforeach
									@endif

									
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><h5 class="color-black">Tổng: @if(Session::has('cart')){{number_format($totalPrice)}}@else 0  @endif đ</h5></div>
									<div class="pull-right"><h5 class="color-black"></h5></div>
									<div class="clearfix"></div>
								</div>
							</div>							
					</div>


					<div class="col-sm-6">
						
						<div class="your-order-head"><h5>Hình thức thanh toán:</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="" >
										<label for="payment_method_bacs">COD </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Thanh toán khi nhận hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">ATM </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền qua tài khoản ngân hàng(STK: 123456789)
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="form-block">
								<label for="notes">Ghi chú (nếu có)</label>
								<textarea id="notes" name="notes"></textarea>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
						
						
					</div>

				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection