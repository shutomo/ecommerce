@extends('layouts.frontend')

@section('content')
<!-- <link rel="stylesheet" href="{{asset('caorsel/bootstrap.css')}}"> -->

<div class="container" style="margin-top:10%">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-lg-center">
                    <h3>{{$product->name}}</h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-4">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                @if(isset($images))
                                    @foreach($images as $i => $image)
                                        @if($i == 0)
                                            <li data-target="#myCarousel" data-slide-to="{{++$i}}" class="active"></li>
                                        @else
                                            <li data-target="#myCarousel" data-slide-to="{{++$i}}"></li>
                                        @endif
                                    @endforeach
                                @else
                                    <li data-target="#myCarousel" data-slide-to="0"></li>
                                @endif
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @if(!isset($images))
                                    <div class="item active">
                                        <img src="{{asset('No-picture.jpg')}}" alt="No Picture" style="width:100%; height: 250px">
                                    </div>
                                @else
                                    @foreach($images as $i => $image)
                                        @if($i == 0)
                                            <div class="item active">
                                                <img src="{{asset('images/'.$image)}}" alt="{{$image}}" style="width:100%; height: 250px">
                                            </div>
                                        @else
                                            <div class="item">
                                                <img src="{{asset('images/'.$image)}}" alt="{{$image}}" style="width:100%; height: 250px">
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                              <span class="fas fa-chevron-left"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                              <span class="fas fa-chevron-right"></span>
                              <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- coursel end -->
                    </div>
                    <div class="col-md-8" style="min-height: 500px">
                        <h3>Price : Rp.{{number_format($product->price)}},-</h3>
                        <br>
                        <h3>
                            Rating : 
                            @for($i=1 ; $i <=5 ; $i++)
                                @if($i<=$avgRating)
                                    <span class="fa fa-star checked"></span>
                                @else
                                    <span class="fa fa-star"></span>
                                @endif
                            @endfor
                        </h3>
                        <br>
                        <hr>

                        <ul class="nav nav-tabs">
                            <li class="active" style="border: 1px solid #ecf0f1;border-radius: 10px 10px 0 0;background-color: #3498db; padding: 10px"><a style="color:#fff" data-toggle="tab" href="#home">Description</a></li>
                            <li style="border: 1px solid #ecf0f1;border-radius: 10px 10px 0 0;background-color: #3498db; padding: 10px"style="border: 1px solid #ecf0f1;border-radius: 10px 10px 0 0;background-color: #3498db; padding: 10px"><a style="color: white" data-toggle="tab" href="#menu1">Review</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active show">
                                <h3>Description</h3>
                                {!! $product->description !!}
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <!-- <div class="box box-danger">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            Give a Review
                                        </h3>
                                    </div>
                                    <div class="box-body">
                                        <form action="{{route('detail.review', ['id' => $product->id])}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                @for($i=1 ; $i <=5 ; $i++)
                                                    <input type="radio" name="rating" value="{{$i}}">
                                                    @for($j= 1; $j <= $i;$j++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    <br>
                                                @endfor
                                            </div>
                                            <div class="form-group">
                                                <h4>Description</h4>
                                                <textarea rows="3" value="{{old('description')}}" class="form-control" name="description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Give a review" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                                <hr>
                                @foreach($review as $row)
                                    <div class="col-md-12" style="background-color: #ecf0f1;margin-bottom: 2%">
                                        <div class="container">
                                            <div class="row" style="padding : 2% 0">
                                                <div class="col-md-3 text-md-center">
                                                    <img src="http://www.stickpng.com/assets/images/585e4bcdcb11b227491c3396.png" width="100px" height="100px">
                                                    <br>
                                                    {{$row->created_at->diffForHumans()}}
                                                </div>
                                                <div class="col-md-8" style="text-align: justify;text-justify: inter-word">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b class="text text-primary">{{$row->user->name}}</b> 
                                                        </div>
                                                        <div class="col-md-8 text-md-right">
                                                            Rating given : 
                                                            @for($i=1 ; $i <=5 ; $i++)
                                                                @if($i<=$row->rating)
                                                                    <span class="fa fa-star checked"></span>
                                                                @else
                                                                    <span class="fa fa-star"></span>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>    
                                                    {!! $row->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- <div class="mt-4">
                            <ul class="nav nav-tab" role="tablist">
                                <li class="nav-item">
                                    <a href="nav-link active" href="#description" role="tab" data-toggle="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="nav-link" href="#review" role="tab" data-toggle="tab">Review</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-2">
                                <div role="tabpanel" class="tab-pane fade in active show" id="description">
                                    {!! $product->description !!}
                                </div>
                                <div role="tabpanel" class="tab-pane fade " id="review">
                                    test
                                </div>
                            </div>
                        </div>  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
