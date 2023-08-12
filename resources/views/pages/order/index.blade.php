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
                            <div class="table-responsive">
                                <table class="tabel table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">User</th>
                                            <th style="text-align: center;">Created At</th>
                                            <th style="text-align: center;">Status Paid</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order )
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ $order->user->name }}</td>
                                            <td style="text-align: center;">{{ $order->created_at }}</td>
                                            <td style="text-align: center;">@if ($order->is_paid == true) PAID @else UNPAID @endif</td>
                                            <td style="text-align: center; width:200px">
                                                @if ($order->is_paid)
                                                <a href="{{url ('storage/' . $order->payment_receipt)}}" class="btn btn-info">
                                                    <i class=" bi bi-images"></i>
                                                </a>
                                                @else
                                                <form action="{{ route('confirm_payment', $order) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')">
                                                        <i class="bi bi-check"></i>
                                                    </button>
                                                </form>
                                                @endif
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