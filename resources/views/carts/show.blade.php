@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <img src="{{ route('products.image', ['imageName' => $products['image_url']])}} " class="card-img-top" alt="...">
        </div>

        <div class="col-md-9">
            <h3>
                {{ $products->name }}
            </h3>
            <h4>
                {{ $products->price }}
            </h4>
            <div class="mt-4">
                <a href="{{ route('carts.add', ['id' => $products['id']])}} " class="btn btn-primary">Beli</a>
            </div>

            <div class="mt-2">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank">
                    Share Facebook
                </a>|
                <a href="https://twitter.com/shareArticle?mini=true&amp;url={{ route('products.show', ['id' =>$product['id']]) }}" class="social-button" target="_blank">
                    Share Twitter
                </a>|
                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('products.show', ['id' =>$product['id']]) }}&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button" target="_blank">
                    Share Linkedin
                </a>|
                <a href="https://wa.me/?text={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank">
                    Share WhatsApp
                </a>
            </div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#description" role="tab" data-toggle="tab">Deskripsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#review" role="tab" data-toggle="tab">Review</a>
                    </li>
                </ul> 
            
            <!-- Tab panes -->
            <div class="tab-content mt-2">
                <div role="tabpanel" class="tab-pane fade in active show" id="description">
                    {!! $products->description !!}
                </div>
                <div role="tabpanel" class="tab-pane fade " id="review">
                    Content untuk review disini 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection