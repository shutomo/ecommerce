@extends('layouts.frontend')
@section('content')
<main style="margin-top: 3%">
<hr>
  <h1 class="text-md-center"><strong>CARTS</strong></h1>
  <hr>
  <br>
    <div class="container" style="min-height:600px">
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
                                <tr class="text-md-center">
                                    <th>No.</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 0;$total =0 ?>
                                @if(session('cart') != null)
                                    @foreach(session('cart') as $index => $row)
                                        <?php $id = $index?>
                                        <tr>
                                            <td>{{++$no}}</td>
                                            <td>{{$row['name']}}</td>
                                            <td class="text-md-right">Rp. {{number_format($row['price'])}}</td>
                                            <td style="text-align: center !important">
                                                <input style="width: 20%" class="text-md-center qty" type="number" value="{{$row['qty']}}">
                                            </td>
                                            <td>Rp. {{number_format($row['price']*$row['qty'])}}</td>
                                            <td class="text-md-center">
                                                <button class="btn btn-success update-cart" data-id="{{$id}}">Update</button>
                                                |
                                                <button class="btn btn-danger remove-cart" data-id="{{$id}}">Delete</button>
                                            </td>
                                        </tr>
                                        <?php $total = $total+($row['price']*$row['qty']) ?>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                @if(session('cart') != null)
                                    <tr>
                                        <th class="text-md-right" colspan="4">Total Pembayaran</th>
                                        <th>Rp. {{number_format($total)}} </th>
                                        <th><a href="{{route('admin.orders.create')}}" class="btn btn-success col-md-12">Check Out</a></th>
                                    </tr>
                                @endif
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

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
