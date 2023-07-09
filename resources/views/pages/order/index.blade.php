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
                            <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Order
                        </a>
                        <div class="table-responsive">
                            <table class="tabel table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">User</th>
                                        <th style="text-align: center;">Created At</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order )
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td style="text-align: center;">{{ $order->user->name }}</td>
                                        <td style="text-align: center;">{{ $order->created_at }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('show_order', $order->id) }}" class="btn btn-info">
                                                 <i class="bi bi-eye"></i>
                                            </a>
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