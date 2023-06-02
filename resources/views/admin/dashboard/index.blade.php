@extends('layouts.admin.index')

@push('css')
    <link rel="stylesheet"
        href="{{ asset('template/admin') }}/css/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="{{ asset('template/admin') }}/css/pages/datatables.css" />
@endpush

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total Aplikasi per Kategori</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg" id="table1{">
                                    <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['totalApplicationByCategory'] as $item)
                                            <tr>
                                                <td class="col-10">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-bold ms-3 mb-0">{{ $item->name }}</p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class="mb-0">
                                                        {{ $item->applications_count }}
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total Aplikasi per Instansi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg" id="table2">
                                    <thead>
                                        <tr>
                                            <th>Instansi</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['totalApplicationByAgency'] as $item)
                                            <tr>
                                                <td class="col-10">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-bold ms-3 mb-0">{{ $item->name }}</p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class="mb-0">
                                                        {{ $item->applications_count }}
                                                    </p>
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

@push('js')
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                "pageLength": 5
            });
            $('#table2').DataTable({
                "pageLength": 5
            });
        });
    </script>
@endpush
