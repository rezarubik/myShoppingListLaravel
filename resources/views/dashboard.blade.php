@extends('layouts.template')
@section('title', 'Dashboard')
@section('content')


<div class="mt-3 mb-3">
    <a href="/product/create" class="btn btn-primary mb-3">Add Things</a>
    <a href="/product/graph" class="btn btn-secondary mb-3">View chart</a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Barang</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Status Barang</th>
                    <th scope="col">Aksi</th>
                    <!-- <th scope="col">Status</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($product as $data)
                    @if($data->status == 0)
                    <td>{{$data->name}}</td>
                    <td>{{$data->description}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->quantity}}</td>
                    <!-- 0 = belum dibeli -->
                    <!-- 1 = sudah dibeli -->
                    <td>
                        <a class="btn btn-outline-success" href="/product/bought/{{$data->id}}">Belum Dibeli</a>
                    </td>
                    @elseif($data->status == 1)
                    <td style="text-decoration:line-through">{{$data->name}}</td>
                    <td style="text-decoration:line-through">{{$data->description}}</td>
                    <td style="text-decoration:line-through">{{$data->price}}</td>
                    <td style="text-decoration:line-through">{{$data->quantity}}</td>
                    <td>
                        <!-- <a class="badge badge-warning" href="/product/unbought/{{$data->id}}">Unbought</a> -->
                        <a class="btn btn-outline-info" href="/product/unbought/{{$data->id}}" style="text-decoration:line-through">Sudah Dibeli</a>
                    </td>
                    @endif
                    <td>
                        <a class="badge badge-primary" href="/product/edit/{{$data->id}}">Edit</a>
                        <a class="badge badge-danger" href="/product/destroy/{{$data->id}}">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection