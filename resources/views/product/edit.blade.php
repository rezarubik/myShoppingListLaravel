@extends('layouts.template')
@section('title', 'Edit Things')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="container mt-4">
            <h4>Edit List Things</h4>
            <div class="card mt-3">
                <div class="card-body">
                    @foreach($product as $data)
                    <form action="/product/update" class="forms-sample" method="post" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="hidden" name="id" class="form-control" placeholder="Enter Nama Barang" value="{{$data->id}}">
                            <input type="text" name="name" class="form-control" id="nama_barang" placeholder="Enter Nama Barang" value=" {{$data->name }}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="description" class="form-control" id="deskripsi" placeholder="Enter Description" value="{{$data->description}}">
                        </div>
                        <div class="form-group">
                            <label for="Harga">Harga</label>
                            <input type="text" name="price" class="form-control" id="Harga" placeholder="Enter Harga" value="{{$data->price}}">
                        </div>
                        <div class="form-group">
                            <label for="Jumlah">Jumlah</label>
                            <input type="text" name="quantity" class="form-control" id="Jumlah" placeholder="Enter Jumlah" value="{{$data->quantity}}">
                        </div>
                        <input type="submit" class="btn btn-success mr-2" value="Tambah">
                        <a href="/" class="btn btn-light">Cancel</a>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @endsection