@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
            <br>
	<!--	<div class="pull-left">
				<h6 class="inner-title"><b>Hãy nhập kích thước mong muốn</b></h6>
			</div>
			<div class="pull-right">
				
			</div>-->
			<div class="clearfix">
                         
            </div>
            
            <br>
            <div class="col-lg-3">
                <form action="{{ route('kq-tim-theo-kich-thuoc') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label><b class="mr-3">Phân loại</b></label>
                        <select name="id_type">
                            @foreach($loai_sp as $loai)
                                <option value="{{ $loai->id }}">{{ $loai->name }}</option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="form-group">
                        <label><b class="mr-3">Hãy nhập kích thước mong muốn (đơn vị cm):</b></label>
                        <br>
                        <table>
                            <tr>
                                <td>Chiều dài:</td>
                                <td><input type="number" name="length_min" min="0" max="1000"></td>
                                <td> ~ </td>
                                <td><input type="number" name="length_max" min="1" max="1000"></td>
                            </tr>
                            <tr>
                                <td>Chiều rộng:</td>
                                <td><input type="number" name="width_min" min="0" max="1000"></td>
                                <td> ~ </td>
                                <td><input type="number" name="width_max" min="1" max="1000"></td>
                            </tr>
                            <tr>
                                <td>Chiều cao:</td>
                                <td><input type="number" name="height_min" min="0" max="1000"></td>
                                <td> ~ </td>
                                <td><input type="number" name="height_max" min="1" max="1000"></td>
                            </tr>
                        </table>
                    </div>
            
                    <button type="submit" class="btn btn-primary"> Tìm kiếm </button>
                <form>
                    
            </div>
		</div>
	</div>

@endsection