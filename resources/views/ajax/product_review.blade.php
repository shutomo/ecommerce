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