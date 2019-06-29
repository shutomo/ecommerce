@extends('layouts.frontend')
@section('content')
    <!--Main layout-->
  <main style="margin-top: 3%">
  <hr>
  <h1 class="text-md-center"><strong>CATALOG</strong></h1>
  <hr>
    <div class="container">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg mt-3 mb-5">
            <!-- Navbar brand -->
            <span>Sort by: </span>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
              aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

              <!-- Links -->
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" onclick="user_sort('terbaru')">Newest</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="user_sort('terbaik')">Best Rating</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="user_sort('best_seller')">Best Seller</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="user_sort('most_viewer')">Most Viewer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="user_sort('termurah')">Low Prices</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="user_sort('termahal')">High Prices</a>
                </li>
              </ul>
            </div>
            <!-- Collapsible content -->
            
        </nav>
      <!--/.Navbar-->

      <!--Section: Products v.3-->
      <section class="text-center mb-4" id="sort_by">
          @php
            $number = 1;
          @endphp
          @foreach($products as $row)
            @if($number == 1)
            <!--Grid row-->
              <div class="row wow fadeIn">
            @endif

              <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">
                  <!--Card-->
                  <div class="card"style="min-height: 100%">
                    <!--Card image-->
                    <div class="view overlay" style="text-align: center;min-height: 225px">
                      @php
                        $images = json_decode($row->image_url);
                      @endphp
                      @if(!isset($images))
                          <img style="display: inline; padding-top: 10%" src="{{asset('No-picture.jpg')}}" width="100">
                      @else
                          @foreach($images as $i => $image)
                              @if($i > 0)
                                  
                              @else
                                  <img style="display: inline; padding-top: 10%" src="{{asset('images/'.$image)}}" width="200" alt="">
                              @endif
                          @endforeach
                      @endif
                      <a href="{{route('detail',['id'=>$row->id])}}">
                        <div class="mask rgba-white-slight"></div>
                      </a>
                    </div>
                    <!--Card image-->

                    <!--Card content-->
                    <div class="card-body text-center">
                      <!--Category & Title-->
                      <a href="" class="grey-text">
                        <!-- <h5>Shirt</h5> -->
                      </a>
                      <h5>
                        <strong>
                          <a href="{{route('detail',['id'=>$row->id])}}" class="dark-grey-text">{{$row->name}}
                            <span class="badge badge-pill danger-color">NEW</span>
                          </a>
                        </strong>
                      </h5>

                      <h4 class="font-weight-bold blue-text">
                        <strong>Rp. {{number_format($row->price)}}</strong>
                      </h4>

                    </div>
                    <!--Card content-->

                  </div>
                  <!--Card-->

                </div>
                <!--Grid column-->

            @if($number == 4)
              </div>
              @php
                $number = 1
              @endphp
            @else
              @php
                $number++
              @endphp
            @endif
          @endforeach

      </section>
      <!--Section: Products v.3-->

      <!--Pagination-->
      <!-- <nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue"> -->

          <!--Arrow left-->
          <!-- <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>

          <li class="page-item active">
            <a class="page-link" href="#">1
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">4</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">5</a>
          </li>

          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav> -->
      <!--Pagination-->

    </div>
  </main>
  <!--Main layout-->
@endsection()

