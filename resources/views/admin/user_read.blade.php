@extends('admin.admin')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Chi tiết</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                            <div class="form-group">
                                <label>Họ tên</label>
                                <div>{{ $detailUser->fullname }}</div>
                            </div>
                            <div class="form-group">
                                <label><b class="mr-3">Email</b></label>
                                <div>{{ $detailUser->email }}</div>
                            </div>
                            <div class="form-group">
                                <label>SDT</label>
                                <div>{{ $detailUser->phone }}</div> 
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <div>{{ $detailUser->address }}</div>
                            </div>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection