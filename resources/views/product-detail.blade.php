@extends('layouts.frontend')
@section('content')
  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">
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
            <div class="carousel-inner" style="overflow: visible;">
                @if(!isset($images))
                    <div class="item active">
                        <img src="{{asset('No-picture.jpg')}}" alt="No Picture" style="width:100%; min-height: 250px">
                    </div>
                @else
                    @foreach($images as $i => $image)
                        @if($i == 0)
                            <div class="item active" style="text-align: center">
                                <img src="{{asset('images/'.$image)}}" alt="{{$image}}" style="width:100%; min-height: 250px">
                            </div>
                        @else
                            <div class="item" style="text-align: center">
                                <img src="{{asset('images/'.$image)}}" alt="{{$image}}" style="width:100%; min-height: 250px">
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <a href="">
                <span class="badge purple mr-1">Cars</span>
              </a>
              <a href="">
                <span class="badge blue mr-1">New</span>
              </a>
              <a href="">
                <span class="badge red mr-1">Lamborghini</span>
              </a>
            </div>

            <p class="lead">
              {{$product->name}}
              <hr>
              <span class="mr-1">
                @php
                  $disc = $product->price * 0.2;
                  $disc = $product->price + $disc;
                @endphp
                <del>Rp. {{number_format($disc)}}</del>
              </span>
              <span>Rp. {{number_format($product->price)}}</span>
            </p>

            <p class="lead font-weight-bold">Description</p>

            <p>{!! $product->description !!}</p>

            <form class="d-flex justify-content-left">
              <!-- Default input -->
              <!-- <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px"> -->
              <a href="{{route('cart.add', ['id'=> $product->id])}}" class="btn btn-primary btn-md my-0 p">Add to cart
                <i class="fas fa-shopping-cart ml-1"></i>
              </a>

            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 text-center">

          <h4 class="my-4 h4">Additional information</h4>

          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit
            voluptates,
            quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4">

          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/11.jpg" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
  @endsection