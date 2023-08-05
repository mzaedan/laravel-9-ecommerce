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
                    <th>Nama</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{$user->is_admin ? 'Admin' : 'Member'}}</td>
                </tr>
            </table>
            <a href="" class="btn btn-primary btn-md">Kembali</a>
            <form action="{{ route ('edit_profile') }}" method="POST">
                @csrf
                <input type="text" name="name" value="{{$user->name}}">
                <input type="password" name="password" id="">
                <input type="password" name="password_confirmation" id="">
                <button type="submit">Change Profile Details</button>
            </form>
        </div>
    </div>
</div>