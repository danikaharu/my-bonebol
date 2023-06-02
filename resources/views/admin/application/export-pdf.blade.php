<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Aplikasi</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
        }

        h1 {
            font-size: 16px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        table>thead>tr>th,
        table>tfoot>tr>td {
            text-align: center;
            vertical-align: middle;
            background-color: #D8E4BC;
            border-color: #D8E4BC;
        }

        .line-title {
            border: 0;
            border-style: inset;
            border-top: 5px solid #000;
        }

        .table-border {
            border: 1px solid #000;
        }

        .table-border th,
        .table-border td {
            border: 1px solid #000;
        }

        .table-leader {
            width: auto;
            float: right;
            border-collapse: collapse;
        }

        .table-leader tr td {
            text-align: center !important;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>
                <img src="{{ public_path('template/admin/images/logo/logo_bonebol.png') }}" width="150" height="100">
            </td>
            <td>
                <h4 style="margin: 0">PEMERINTAH KABUPATEN BONE BOLANGO</h4>
                <h3 style="margin: 0">DINAS KOMUNIKASI DAN INFORMATIKA</h3>
                <h6 style="margin: 0">Jl. Prof. Dr. Ing B.J. Habibie Kecamatan Suwawa, Kode Pos. 96562</h6>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <br>

    <h1>DAFTAR REKAPAN WEBSITE OPD DAN KECAMATAN TAHUN {{ \Carbon\Carbon::now()->year }}</h1>

    <br>

    <table class="table-border" align="center">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Instansi</th>
                <th rowspan="2">Link Website</th>
                <th colspan="2">Status</th>
            </tr>
            <tr>
                <th style="width: 10%">Aktif</th>
                <th style="width: 10%">Tidak Aktif</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $application)
                <tr>
                    <td style="text-align:center;vertical-align:middle; ">{{ $loop->iteration }}</td>
                    <td>{{ $application->agency->name }}</td>
                    <td>{{ $application->url }}</td>
                    <td style="text-align:center;vertical-align:middle; font-size:20px">
                        @if ($application->status() == 'Aktif')
                            &#10003;
                        @else
                            -
                        @endif
                    </td>
                    <td style="text-align:center;vertical-align:middle; font-size:20px">
                        @if ($application->status() == 'Tidak Aktif')
                            &#10003;
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                Maaf, belum ada data
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <b>TOTAL</b>
                </td>
                <td>{{ $activeApplications }}</td>
                <td>{{ $notActiveApplications }}</td>
            </tr>
        </tfoot>
    </table>

    <br>
    <br>
    <table class="table-leader">
        <tr>
            <td>KEPALA DINAS</td>
        </tr>
        <tr>
            <td>
                <b>KOMUNIKASI DAN INFORMATIKA</b>
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 6em;">
                <b>KABUPATEN BONE BOLANGO</b>
            </td>
        </tr>
        <tr>
            <td>
                <b>MISNAWATY WANTOGIA, S.E, M.M</b>
            </td>
        </tr>
        <tr>
            <td>
                NIP. 197712012005012017
            </td>
        </tr>
    </table>
</body>

</html>
