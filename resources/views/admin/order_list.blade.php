@extends('admin.admin')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn hàng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã ĐH</th>
                                <th>Ngày đặt</th>
                                <th>Email đặt hàng</th>                              
                                <th>Tổng tiền</th>
                                <th>Hình thức thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $li)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $li->id }}</td>
                                <td>{{ $li->date_order }}</td>
                                <td>{{ $li->user->email }}</td>
                                <td>{{ $li->total }}</td>
                                <td>{{ $li->payment }}</td>
                                <td>
                                    @if ($li->status == 1) 
                                        <font color="orange">Chờ xác nhận</font>
                                    @elseif ($li->status == 2)
                                        <font color="green">Tiếp nhận/ Đang giao</font>
                                    @elseif ($li->status == 3)
                                        <font color="grey">Đã giao</font>
                                    @else 
                                        <font color="red">Đã hủy</font>
                                    @endif
                                </td>
                                <td class="center">
                                    <button>
                                        <a href="{{ route('read_order', $li->id) }}"><i class="fa fa-eye"></i>
                                    </button>
                                    <button>
                                        <a href="{{ route('edit_order', $li->id) }}"><i class="fa fa-pencil"></i>
                                    </button>
                                </td>                        
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="row">{{ $list->links() }}</div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection