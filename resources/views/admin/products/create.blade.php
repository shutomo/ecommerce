@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h2>Tambah Produk</h2>
            <br/>
            @if(count($errors))
                <div class="form-group">
                    <div clas="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <br/>

            <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Nama Produk</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Nama Produk</div>
                        </div>
                        <input type="text" class="form-control" name="name" id="inlineFormInputGroup" placeholder="Nama Produk">
                    </div>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Harga</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Harga</div>
                        </div>
                        <input type="text" class="form-control" name="price" id="inlineFormInputGroup" placeholder="cont: 15000000">
                    </div>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Deskripsi</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Deskripsi</div>
                        </div>
                        <textarea name="description" class="form-control" id="ckview" rows="3" placeholder="Deskripsi"></textarea>
                    </div>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Gambar</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Gambar</div>
                        </div>
                        <input required type="file" name="image_url" class="form-control">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-warning"><< Kembali</a>
                </div>
            </form>        
        </div>
    </div>
</div>
@endsection

<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector:'#ckview'});</script>