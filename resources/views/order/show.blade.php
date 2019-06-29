@extends('layouts.frontend')
@section('content')
<div class="main" style="margin: 10% 0">
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
                        <form class="login100-form">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <p class="text text-info">Alamat Pengiriman : {!! strip_tags($order->shipping_address) !!}, ({{ $order->zip_code }})</p>
                                <hr>
                                </div>
                            </div>    
                        </form>
                        

                        <table class="table table-striped">
                            <thead>
                                <tr class="text-md-center">
                                    <th>No.</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 0;$total =0 ?>
                                @foreach($order->orderItems as $index => $row)
                                    <tr>
                                        <td>{{++$no}}</td>
                                        <td> <img src="{{asset('images/'.json_decode($row->product->image_url)[0])}}" width="100"> {{$row->product->name}}</td>
                                        <td class="text-md-right">Rp. {{number_format($row['price'])}}</td>
                                        <td style="text-align: center !important">{{$row['qty']}}</td>
                                        <td>Rp. {{number_format($row['price']*$row['qty'])}}</td>
                                    </tr>
                                    <?php $total = $total+($row['price']*$row['qty']) ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-md-right" colspan="4">Total Pembayaran</th>
                                    <th>Rp. {{number_format($total)}} </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url : "{{route('cart.update')}}",
                method: "get",
                data: {
                    id:ele.attr("data-id"),
                    qty:ele.parents("tr").find(".qty").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url : "{{route('cart.remove')}}",
                method: "get",
                data: {
                    id:ele.attr("data-id"),
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    });

</script>
@endsection
