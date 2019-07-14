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
                    <th scope="col">Things</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Bought</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($product as $data)
                    <td>{{$data->name}}</td>
                    <td>{{$data->description}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->quantity}}</td>
                    <!-- 0 = belum dibeli -->
                    <!-- 1 = sudah dibeli -->
                    @if($data->status == 0)
                    <td class="badge badge-danger">Belum Dibeli</td>
                    @elseif($data->status == 1)
                    <td class="badge badge-primary">Sudah dibeli</td>
                    @endif
                    <td>
                        <a class="badge badge-primary" href="/product/edit/{{$data->id}}">Edit</a>
                        <a class="badge badge-danger" href="/product/destroy/{{$data->id}}">Delete</a>
                    </td>
                    @if($data->status == 0)
                    <td>
                        <a class="badge badge-warning" href="/product/bought/{{$data->id}}">Bought</a>
                    </td>
                    @elseif($data->status == 1)
                    <td>
                        <a class="badge badge-warning" href="/product/unbought/{{$data->id}}">Unbought</a>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection