@extends('layouts.admin')

@section('content')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $data->name}}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $data->price }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $data->description }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <img src="{{ asset('storage/'.$data->image) }}" style="width: 150px;">
                    </td>
                </tr>
            </table>
            <a href="{{ route ('index_product') }}" class="btn btn-primary btn-md">Kembali</a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('add_to_cart', $data) }}" method="POST">
                @csrf
                <div class="col-md-4">
                    <label>Amount</label>   
                </div>
                <div class="col-md-4 form-group">
                    <input type="number" name="amount" value="1" class="form-control">
                </div>
                <button type="submit">Add To Cart</button>
            </form>
        </div>
    </div>
</div>