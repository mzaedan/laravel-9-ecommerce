@extends('layouts.admin')

@section('content')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <section id="content-types">
        <div class="row">
            <div class="col-xl-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                        <a href="{{ route('create_product') }}" class="btn btn-sm btn-primary shadow-sm mb-3">
                            <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Product
                        </a>
                        <div class="table-responsive">
                            <table class="tabel table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Price</th>
                                        <th style="text-align: center;">Description</th>
                                        <th style="text-align: center;">Image</th>
                                        <th style="text-align: center;">Stock</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product )
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td style="text-align: center;">{{ $product->name }}</td>
                                        <td style="text-align: center;">{{ $product->price }}</td>
                                        <td style="text-align: center;">{{ $product->description }}</td>
                                        <td style="text-align:center;">
                                        <img src="{{ asset('storage/'.$product->image) }}" style="width: 150px;">
                                        </td>
                                        <td style="text-align: center;">{{ $product->stock }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('show_product', $product->id) }}" class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('delete_product', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" onclick="return confirm('Are You Sure, You Want To Delete This Data?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3 mb-6">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection