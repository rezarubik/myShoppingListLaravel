@extends('layouts.template')
@section('title', 'Edit Things')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="container mt-4">
            <h4>Edit List Things</h4>
            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{route('product.update', $product->id)}}" class="forms-sample" method="post" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="hidden" name="id" class="form-control" placeholder="Enter Nama Barang" value=" {{$product->name_things }}">
                            <input type="text" name="nama" class="form-control" id="nama_barang" placeholder="Enter Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Enter Description" value="{{$product->description}}">
                        </div>
                        <div class="form-group">
                            <label for="Harga">Harga</label>
                            <input type="text" name="harga" class="form-control" id="Harga" placeholder="Enter Harga" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label for="Jumlah">Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" id="Jumlah" placeholder="Enter Jumlah" value="{{$product->quantity}}">
                        </div>
                        <input type="submit" class="btn btn-success mr-2" value="Tambah">
                        <a href="{{route('product.index')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection