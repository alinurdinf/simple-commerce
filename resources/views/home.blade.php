@extends('layouts.admin')
<style>
    .card-custom {
        min-height: 120px;
        border-radius: 1.5rem !important;
    }

</style>
@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-120 py-2 card-custom">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$widget['users']}} User</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card card-custom h-120 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah User Aktif</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$widget['active_users']}} User</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-120 py-2 card-custom">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$widget['products']}} Produk</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card card-custom h-120 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Produk Aktif</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$widget['active_products']}} Produk</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold ">Produk Terbaru</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Tanngal Dibuat</th>
                            <th scope="col">Harga (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                        <tr>
                            <td><img src="{{$item->galleries->first()->url}}" width="50px">{{$item->name}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                            <td>Rp. {{ number_format($item->price, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>


</div>
@endsection
