@extends('layouts.admin.index')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Aplikasi</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.application.index') }}">Aplikasi</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $application->name }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive-sm table-hover table-bordered"">
                        <thead>
                            <tr>
                                <th scope=" col">Nama</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Aplikasi</strong></td>
                                <td><a href="{{ $application->url }}" target="_blank">{{ $application->name }}</a> </td>
                            </tr>
                            <tr>
                                <td><strong>Instansi</strong></td>
                                <td>{{ $application->agency->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kategori Aplikasi</strong></td>
                                <td>{{ $application->category->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Layanan</strong></td>
                                <td>{{ $application->service_type() }}</td>
                            </tr>
                            <tr>
                                <td><strong>Wilayah Layanan</strong></td>
                                <td>{{ $application->service_area() }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>
                                    @if ($application->status == 1)
                                        <span class="badge bg-primary">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
