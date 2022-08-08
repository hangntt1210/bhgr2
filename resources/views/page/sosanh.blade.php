@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Hãy chọn 2 sản phẩm muốn so sánh</h6>
			</div>
			<div class="pull-right">
				
			</div>
			<div class="clearfix">
                         
            </div>
            <br>
            <div>
                <form action="{{ route('bang-so-sanh') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Sản phẩm 1: </label>
                        <select name="product1">
                            @foreach($tatcasp as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                            @endforeach
                        </select>
                        <label>Sản phẩm 2: </label>
                        <select name="product2">
                            @foreach($tatcasp as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-default" value="Đánh giá"> So sánh </button>
                <form>
                    
            </div>
		</div>
	</div>

@endsection