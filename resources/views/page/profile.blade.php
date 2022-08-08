@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Profile</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
<!--					<a href="{{route('trang-chu')}}">Home</a> / <span>Đăng nhập</span>-->
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			<div class="col-lg-7" style="padding-bottom:120px">			
				 <div class="form-group">
	                <label>Email</label>
	                <div>{{ Auth::user()->email }}</div>
	            </div>
	            <div class="form-group">
	                <label>Họ tên</label>
	                <div>{{ Auth::user()->fullname }}</div>
	            </div>
	            <div class="form-group">
	                <label>SDT</label>
	                <div>{{ Auth::user()->phone }}</div> 
	            </div>
	            <div class="form-group">
	                <label>Địa chỉ</label>
	                <div>{{ Auth::user()->address }}</div>
	            </div>
	            <div class="form-group">
	                <label><a href="{{ route('profile') }}">Đơn hàng đã đặt</a></label>
	                (0)
	            </div>
	            <div class="form-group">
	                <label><a href="{{ route('profile') }}">Danh sách sản phẩm yêu thích</a></label>
	                (0)
	            </div>
	         </div>   
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection