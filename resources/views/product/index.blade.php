@extends('layouts.frontend')
@section('content')
<main style="margin-top: 3%">
<hr>
    <h1 class="text-md-center"><strong>CAR LIST</strong></h1>
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
                  <a class="nav-link" onclick="sort('terbaru')">Newest</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="sort('terbaik')">Best Rating</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="sort('best_seller')">Best Seller</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="sort('most_viewer')">Most Viewer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="sort('termurah')">Low Prices</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="sort('termahal')">High Prices</a>
                </li>
              </ul>
            </div>
            <!-- Collapsible content -->
            
        </nav>
      <!--/.Navbar-->

      <form class="form-inline">
                <div class="md-form my-0">
                    <a href="{{route('admin.products.create')}}" class="btn btn-primary rounded"> Add Product </a>
                  <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> -->
                </div>
              </form>
              <hr>

      <!--Section: Products v.3-->
      <section class="text-center mb-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th>Sold</th>
                    <th>Seen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="sort_by">
                @foreach($products as $index => $row)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$row->name}}</td>
                        <td>Rp. {{number_format($row->price)}}</td>
                        <td>
                            @for($i=1 ; $i <=5 ; $i++)
                                @if($i<=$row->rating)
                                    <span class="fa fa-star checked"></span>
                                @else
                                    <span class="fa fa-star"></span>
                                @endif
                            @endfor
                        </td>
                        <td>{{ (isset($row->quantity)) ? $row->quantity : 0 }}</td>
                        <td>{{ $row->views }}</td>
                        <td class="text-center">
                            <a href="{{route('admin.products.show', ['id'=>$row->id])}}" class="btn btn-info rounded"> Info </a>
                            <a href="{{route('admin.products.edit', ['id'=>$row->id])}}" class="btn btn-warning rounded"> Edit </a>
                            <a href="{{route('admin.products.delete', ['id'=>$row->id])}}" onclick="return confirm('Are you sure want to delete {{$row->name}} ?')" class="btn btn-danger rounded"> Delete </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </section>
      <!--Section: Products v.3-->
    </div>
</main>
<script type="text/javascript">
    function sort(request) {
        $.ajax({
            type: "GET",
            data: {order_by : request}, 
            url: "{{route('ajax.products.sort')}}",
            success: function(html) {
                $("#sort_by").html(html);
            }
        });
    }
</script>
@endsection
<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{$title}}
                </div>

                <div class="card-body">
                    <div class="col-md-12 text-center">
                        <a href="{{route('admin.products.create')}}" class="btn btn-primary">Add New Product</a>
                    </div>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $index => $row)
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>Rp. {{number_format($row->price)}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.products.show', ['id'=>$row->id])}}" class="btn btn-info"> Show </a>
                                        <a href="{{route('admin.products.edit', ['id'=>$row->id])}}" class="btn btn-warning"> Edit </a>
                                        <a href="{{route('admin.products.delete', ['id'=>$row->id])}}" onclick="return confirm('Are you sure want to delete {{$row->name}} ?')" class="btn btn-danger"> Delete </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 -->
