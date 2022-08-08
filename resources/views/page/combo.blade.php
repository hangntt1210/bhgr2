@extends('master')
@section('content')

	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						

						

						<div class="beta-products-list">
							<h4>Tất cả sản phẩm</h4> 
							<div class="beta-products-Chi tiết">
								<p class="pull-left">có {{count($tatcasp_count)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">

							@foreach($tatcasp as $sp)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="source/image/product/{{$sp->image}}" alt="">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>          
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
                            <div>
                            	{{$tatcasp->links()}}
                            </div>
                            
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection