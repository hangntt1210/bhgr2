@extends('admin.admin')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $li)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $li->id }}</td>
                                <td>{{ $li->fullname }}</td>
                                <td>{{ $li->email }}</td>
                                <td>{{ $li->phone }}</td>
                                <td>{{ $li->address }}</td>
                                <td class="center">
                                    <button><a href="{{ route('read_user', $li->id) }}"><i class="fa fa-eye"></i></button>
                                    <button><a href="{{ route('edit_user', $li->id) }}"><i class="fa fa-pencil"></i></button>
                                    
                                </td> 
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection