@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<h2>Masukan Alamat</h2>

			<br />
			@if(count($errors))
			<div class="form-group">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif
			<br />

			<form action="{{ route('admin.orders.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Alamat Pengiriman</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Alamat Pengiriman</div>
                        </div>
                        <textarea name="shipping address" class="form-control" rows="3" placeholder="Alamat Pengiriman"></textarea>
                    </div>
				</div>
				<div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Kode Pos</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Kode Pos</div>
                        </div>
                        <input type="number" name="zip_code" class="form-control" placeholder="Kode Pos">
                    </div>
				</div>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="{{ route('carts.index') }}" class="btn btn-warning"><< Kembali</a>
                </div>
				</form>
			</div>
		</div>
	</div>
@endsection

<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector: '#ckview' });</script>