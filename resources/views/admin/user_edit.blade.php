@extends('admin.admin')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Chỉnh sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('update_user', $userEdit->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="fullname" value="{{ $userEdit->fullname }}" placeholder="tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{ $userEdit->email }}" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>SDT</label>
                                <input class="form-control" name="phone" value="{{ $userEdit->phone }}" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" value="{{ $userEdit->address }}" placeholder="" />
                            </div>

                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection