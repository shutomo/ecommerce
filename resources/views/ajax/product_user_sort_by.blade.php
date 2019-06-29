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
        <div class="card">
          <!--Card image-->
          <div class="view overlay" style="text-align: center">
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