@extends('layouts.admin')

@section('content')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    @php
    $total_price = 0;
    @endphp

    <section id="content-types">
        <div class="row">
            <div class="col-xl-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary mb-3">Checkout <i class="bi bi-cart-check"></i></button>

                                </form>

                                <table class="tabel table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Image</th>
                                            <th style="text-align: center;">Product</th>
                                            <th style="text-align: center;">Amount</th>
                                            <th style="text-align: center;">Total</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($carts as $cart )
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">
                                                <img src="{{ asset('storage/'.$cart->product->image) }}" style="width: 150px;">
                                            </td>
                                            <td style="text-align: center;">{{ $cart->product->name }}</td>
                                            <td style="text-align: center;">{{ $cart->amount }}</td>
                                            <td style="text-align: center;">
                                                {{ $total_price += $cart->product->price * $cart->amount }}
                                            </td>
                                            <td style="text-align:center;">
                                                <a href="{{ route('edit_cart', $cart->id) }}" class="btn btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('delete_cart', $cart->id) }}" method="POST" class="d-inline">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

@endsection