@extends('layouts.frontend')

@section('content')
<main style="margin-top: 3%">
  <hr>
  <h1 class="text-md-center"><strong>LIST ORDER</strong></h1>
  <hr>
  <br>
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{$title}}
                    </div>

                    <div class="card-body">
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
                        <table class="table table-striped">
						<thead>
								<tr>
									<th>#</th>
									<th>Harga Total</th>
									<th>Status</th>
									<th>Kode Pos</th>
									<th>Alamat Pengiriman</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders as $order)
									<tr>
										<td>{{$order->id}}</td>
										<td>Rp. {{number_format($order->total_price)}}</td>
										<td>{{$order->status}}</td>
										<td>{{$order->zip_code}}</td>
										<td>{{$order->shipping_address}}</td>
										<td>
											<a href="{{route('admin.orders.show', ['id' => $order->id ])}}" class="btn btn-info">Detail Order</a>
										</td>
									</tr>
								@endforeach
							</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</main>
@endsection