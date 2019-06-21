@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img src="{{ asset('image_files/'.$product['image_url']) }}" class="card-img-top" alt="...">
        </div>

        <div class="col-md-9">
            <h3>
                {{ $product->name}}
            </h3>
            <h4>
            {{ $product->price }}
            </h4>
            <div class="mt-4">
               <a href="{{ route('carts.add', ['id' => $product['id']]) }}" class="btn btn-primary"> Beli</a>
               <a href="{{ route('admin.products.index') }}" class="btn btn-warning"><< Kembali</a>
            </div>
            <div class="mt-2">
            <a href="https://www.facebook.com/sharer/sharer.php?u= {{ route('products.show', ['id' => $product['id']]) }}" class="social-button fab fa-facebook-f" target="_blank">
                Share Facebook
            </a>|

            <a href="https://twitter.com/intent/tweet?text=my share text&amp:url={{ route('products.show', ['id' => $product['id']]) }}" class="social-button fab fa-twitter" target="_blank">
                Share Twitter
            </a>|

            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('products.show', ['id' => $product['id']]) }}&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button fab fa-linkedin" target="_blank">
                Share Linkedin
            </a>|

            <a href="https://wa.me/?text={{route('products.show', ['id' => $product['id']]) }}" class="social-button fab fa-whatsapp" target="blank">
                Share Whatsapp
            </a>|
        </div>
            <div class="mt-4">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#description" role="tab" data-toggle="tab">Deskripsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#review" role="tab" data-toggle="tab">Review</a>
                    </li>
                </ul>

                <!-- Tab panes-->
                <div class="tab-content mt-2">
                    <div role="tabpanel" class="tab-pane fade in active show" id="description">
                    {!! $product->description !!}
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="review">
                        Rating
                        <br>
                        <input type="radio" class="form-radio" name="rd" id="rd1"> <label for="rd1">1</label>
                        <br>
                        <input type="radio" class="form-radio" name="rd" id="rd2"> <label for="rd2">2</label>
                        <br>
                        <input type="radio" class="form-radio" name="rd" id="rd3"> <label for="rd3">3</label>
                        <br>
                        <input type="radio" class="form-radio" name="rd" id="rd4"> <label for="rd4">4</label>
                        <br>
                        <input type="radio" class="form-radio" name="rd" id="rd5"> <label for="rd4">5</label>
                        <br>

                        Deskripsi 
                        <form>
                            <textarea name="editor" id="ckview" class="form-control" rows="3"></textarea>
                        </form>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector: '#ckview' });</script>