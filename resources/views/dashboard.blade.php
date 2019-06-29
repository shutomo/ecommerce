@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h1> Dashboard </h1>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select id="order_field" class="form-control">
                                    <option value="" disabled selected>Urutkan</option>
                                    <option value="best_seller">Best Seller</option>
                                    <option value="terbaik" >Terbaik (Berdasarkan Rating)</option>
                                    <option value="termurah">Termurah</option>
                                    <option value="termahal">Termahal</option>
                                    <option value="terbaru">Terbaru</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(null != session('message'))
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{session('message')}}</li>
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                    @foreach($products as $product)
                        <?php
                            $images = json_decode($product->image_url);
                        ?>
                        <div class="col-md-4">
                            <div class="card" style="min-height: 250px;margin-bottom:10px">
                                <div class="card-header">
                                    {{$product->name}}
                                </div>
                                <a href="{{route('detail',['id'=>$product->id])}}">
                                    <div class="card-body">
                                        <div style="min-height: 150px" class="text-md-center">
                                                @if(!isset($images))
                                                    <img src="{{asset('No-picture.jpg')}}" width="100px">
                                                @else
                                                    @foreach($images as $i => $image)
                                                        @if($i > 0)
                                                            
                                                        @else
                                                            <img src="{{asset('images/'.$image)}}" width="100px">
                                                        @endif
                                                    @endforeach
                                                @endif
                                        </div>
                                        <hr>
                                        Rp. {{number_format($product->price)}}
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#order_field').change(function() {
                window.location.href = '/?order_by='+ $(this).val();
        });
    });
</script>
@endsection
