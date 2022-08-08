@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Danh sách đơn hàng đã đặt({{ $dem_don }})</h6>
			</div>
			<div class="pull-right">
				
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã ĐH</th>
                        <th>Ngày đặt</th>                          
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tatca_don as $li)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $li->id }}</td>
                        <td>{{ $li->date_order }}</td>
                        <td>{{ $li->total }}</td>
                        <td>
                            @if ($li->status == 1) 
                                <font color="orange">Chờ xác nhận</font>
                            @elseif ($li->status == 2)
                                <font color="green">Tiếp nhận/ Đang giao</font>
                            @elseif ($li->status == 3)
                                <font color="grey">Đã giao <a href="{{ route('danh-gia-don', $li->id) }}" class="btn btn-info" role="button">Đánh giá</a></font>
                            @else 
                                <font color="red">Đã hủy</font>
                            @endif
                        </td>
                        <td class="center">
                            <button>
                                <a href="{{ route('chi-tiet-don', $li->id) }}"><i class="fa fa-eye"></i>
                            </button>
                        </td>                        
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection