@extends('admin.admin')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Sản phẩm</th>
                                <th>Phân loại</th>
                                <th>Chất liệu</th>
                                <th>Giá tiền</th>
                                <th>Giá khuyến mại</th>
                                <th>Số lượng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $li)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $li->id }}</td>
                                <td>{{ $li->name }}</td>
                                <td>{{ $li->type->name }}</td>
                                <td>{{ $li->material->name }}</td>
                                <td>{{ $li->price }}</td>
                                <td>{{ $li->promotion_price }}</td>
                                <td>{{ $li->quantity }}</td>
                                <td class="center">
                                    <button>
                                        <a href="{{ route('read_product', $li->id) }}"><i class="fa fa-eye"></i>
                                    </button>
                                    <button>
                                        <a href="{{ route('edit_product', $li->id) }}"><i class="fa fa-pencil"></i>
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