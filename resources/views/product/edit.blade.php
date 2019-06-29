@extends('layouts.frontend')
@section('content')
<div class="container" style="margin-top: 7%">
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
                    <form method="POST" enctype="multipart/form-data" action="{{route('admin.products.update', ['id' => $product->id ])}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ ($product->name) ? $product->name :  old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ ($product->price) ? $product->price : old('price') }}" required autofocus>
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <div class="input-group control-group control-image increment-image" >
                                    <input type="file" name="filename[]" >
                                    <div class="input-group-btn"> 
                                        <button class="btn btn-primary btn-image" type="button"><i class="fa fa-plus"> </i> Add</button>
                                    </div>
                                </div>
                                
                                <div class="clone-image hide">
                                    <div class="control-group control-image input-group" style="margin-top:10px">
                                    <input type="file" name="filename[]">
                                        <div class="input-group-btn"> 
                                            <button class="btn btn-danger btn-danger-image" type="button"><i class="fa fa-trash"> </i> Remove</button>
                                        </div>
                                  </div>
                                </div>
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-12 col-form-label text-md-center">{{ __('Description') }}</label>

                            <div class="col-md-12">
                                <textarea style="" id="description" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>{{($product->description) ? $product->description : old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-md-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-image").click(function(){ 
          var html = $(".clone-image").html();
          $(".increment-image").after(html);
      });

      $("body").on("click",".btn-danger-image",function(){ 
          $(this).parents(".control-image").remove();
      });

      $(".btn-video").click(function(){ 
          var html = $(".clone-video").html();
          $(".increment-video").after(html);
      });

      $("body").on("click",".btn-danger-video",function(){ 
          $(this).parents(".control-video").remove();
      });

    });

</script>
@endsection
