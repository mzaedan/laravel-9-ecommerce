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
                    <th>ID</th>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>{{ $data->user->name }}</td>
                </tr>
                @foreach($data->transactions as $transaction)
                    <tr>
                        <th>Product</th>
                        <td>{{ $transaction->product->name }}</td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>{{ $transaction->amount }}</td>
                    </tr>
                @endforeach
            </table>
            <a href="{{ route ('index_product') }}" class="btn btn-primary btn-md">Kembali</a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
           @if($data->is_paid == false && $data->payment_receipt == null)
           <form action="{{ route('submit_payment_receipt', $data) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="payment_receipt">Upload Your Payment Receipt</label>
                <input type="file" name="payment_receipt" id="payment_receipt">
                <button type="submit">Submit Payment</button>
           </form>
           @endif
        </div>
    </div>
</div>