@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Bảng so sánh 2 sản phẩm: <b>{{ $pr1->name }}</b> và <b>{{ $pr2->name }}</b></h6>
			</div>
			<div class="pull-right">			
			</div>
			<div class="clearfix">
            </div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Đặc điểm</th>
                        <th>{{ $pr1->name }}</th>
                        <th>{{ $pr2->name }}</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Kích thước</td>
                        <td>{{ $pr1->length }} x {{ $pr1->width }} x {{ $pr1->height }}(cm)</td>
                        <td>{{ $pr2->length }} x {{ $pr2->width }} x {{ $pr2->height }}(cm)</td>
                    </tr>
                    <tr>
                        <td>Chất liệu</td>
                        <td>{{ $pr1->material->name }}</td>
                        <td>{{ $pr2->material->name }}</td>
                    </tr>
                    <tr>
                        <td>Danh mục</td>
                        <td>{{ $pr1->type->name }}</td>
                        <td>{{ $pr2->type->name }}</td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td>{{ $pr1->description }}</td>
                        <td>{{ $pr2->description }}</td>
                    </tr>
                    <tr>
                        <td>Lượt mua</td>
                        <td>{{ count($luot_mua1) }}</td>
                        <td>{{ count($luot_mua2) }}</td>
                    </tr>

                </tbody>
            </table>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection