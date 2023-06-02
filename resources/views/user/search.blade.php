@extends('layouts.user.index')

@section('content')
    <!-- sale section -->

    <section class="sale_section layout_padding">
        <div class="container-fluid">
            <div class="heading_container">
                <h2>
                    Pencarian Aplikasi
                </h2>
                <p>
                    {{ implode(',', $keyword) }}
                </p>
            </div>
            <div class="sale_container" id="applications">
                @forelse ($applications as $application)
                    <div class="box">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="img-box">
                                        <img src="{{ asset('storage/upload/kategori/' . $application->category->icon) }}"
                                            alt="" width="300" height="300">
                                    </div>
                                    <div class="detail-box">
                                        <h6>
                                            <a href="{{ $application->url }}" target="_blank">
                                                {{ $application->name }}
                                            </a>
                                        </h6>
                                        <p>
                                            ({{ $application->agency->name }})
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    Maaf, belum ada data
                @endforelse
            </div>
        </div>
    </section>

    <!-- end sale section -->
@endsection
