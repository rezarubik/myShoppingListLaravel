@extends('layouts.template')
@section('title', 'Add Things')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="container mt-4">
            <h4>Input List Things</h4>
            <div class="card mt-3">
                @isset($checkDataError)
                <span><?php echo $checkDataError; ?></span>
                @endisset                
                <div class="card-body">
                    <form action="/product/store" method="post" class="forms-sample" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="name" class="form-control" id="nama_barang" placeholder="Enter Nama Barang" value="{{old('name')}}">
                            @if ($errors->has('name'))
                            <span class="label label-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="description" class="form-control" id="deskripsi" placeholder="Enter Description" value="{{old('description')}}">
                            @if ($errors->has('description'))
                            <span class=" label label-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Harga">Harga</label>
                            <input type="text" name="price" class="form-control" id="Harga" placeholder="Enter Harga" value="{{old('price')}}">
                            @if ($errors->has('price'))
                            <span class=" label label-danger">{{$errors->first('price')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Jumlah">Jumlah</label>
                            <input type="text" name="quantity" class="form-control" id="Jumlah" placeholder="Enter Jumlah" value="{{old('quantity')}}">
                            @if ($errors->has('price'))
                            <span class=" label label-danger">{{$errors->first('price')}}</span>
                            @endif
                        </div>
                        <a href="/product" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection