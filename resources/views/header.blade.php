	
<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> Hanoi</a></li>
						<li><a href=""><i class="fa fa-phone"></i> +0123.886.799</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-Chi tiết menu-beta l-inline">
					@if(Auth::check())
						<li><a href="{{ route('profile') }}"><i class="fa fa-user"></i>{{Auth::user()->fullname}}</a></li>
						<li><a href="{{route('logout')}}"><b>Đăng xuất</b></a></li>
					@else
						<li><a href="{{ route('signup') }}">Đăng kí</a></li>
						<li><a href="{{ route('login') }}">Đăng nhập</a></li>
					@endif		
					@can('admin')	
						<li><a href="{{ route('list_product') }}">Quản lý</a></li>		
					@endcan	
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->

			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('trang-chu')}}" id="logo"><img src="source/assets/dest/images/logo-nha.jpg" width="200px" alt=""></a>
				</div>

				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
<!--tim kiem-->
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Tìm..." /><!--name="key"-->
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>
<!--don hang-->
					@if(Auth::check())
						<div class="beta-comp">						
							<div class="cart">
								<a href="{{ route('da-dat') }}">đơn hàng đã đặt</a>		
							</div>  						
						</div>
					@else
					@endif
<!--gio hang-->
					<div class="beta-comp">
						@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i>(@if(Session::has('cart')) {{Session('cart')->totalQty}} @else 0 @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">

								@foreach($product_cart as $product)
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href=""><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											<span class="cart-item-amount">{{$product['qty']}} x <span> {{number_format($product['item']['price'])}}đ</span></span>
										</div>
									</div>
								</div>
								@endforeach
								

								<div class="cart-caption">
									<div class="cart-total text-right">Tổng: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div>  
						@endif
					</div>

				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #f0a630;">
			<div class="container">
				<!--<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>-->
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}"><b>TRANG CHỦ</b></a></li>
						<li><a href="#"><b>CÁC LOẠI</b></a>
							<ul class="sub-menu">
								
								@foreach($loai_sp as $loai)
								<li><a href="{{route('loaisanpham',$loai->id)}}"><b>{{$loai->name}}</b></a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="#"><b>CHẤT LIỆU</b></a>
							<ul class="sub-menu">
								
								@foreach($loai_chatlieu as $loai)
								<li><a href="{{route('loaichatlieu',$loai->id)}}"><b>{{$loai->name}}</b></a></li>
								@endforeach
							</ul>
						</li>
					<!--	<li><a href=""><b>COMBO ĐẶC BIỆT</b></a></li> -->
					<!--	<li><a href="{{route('so-sanh')}}"><b>SO SÁNH</b></a></li> -->
						<li><a href="{{route('tim-theo-kich-thuoc')}}"><b>TÌM THEO KÍCH THƯỚC</b></a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->