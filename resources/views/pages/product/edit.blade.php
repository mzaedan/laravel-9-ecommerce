@extends('layouts.admin')

@section('content')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Product</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('update_product', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Name" value="{{ $item->name }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Price</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                        <input type="number" class="form-control" name="price"
                                                placeholder="Price" value="{{ $item->price }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Description</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control" name="description"
                                                placeholder="Description" value="{{ $item->description }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>stock</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" class="form-control" name="stock"
                                                placeholder="Stock" value="{{ $item->stock }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Image</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" class="form-control" name="image" placeholder="Image">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>