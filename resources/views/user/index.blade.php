@extends('layouts.user.index')

@push('slider')
    <!-- slider section -->
    <section class="slider_section ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-box">
                        <h1 class="text-center">
                            <span> Portal Aplikasi</span> <br>
                            Bone Bolango
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end slider section -->
@endpush

@section('content')
    <!-- find section -->
    <section class="find_section ">
        <div class="container">
            <form action="{{ route('search') }}" method="GET">
                <div class=" form-row">
                    <div class="col-md-10">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari Nama Aplikasi Disini"
                            autocomplete="off" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit">
                            search
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </section>

    <!-- end find section -->

    <!-- sale section -->

    <section class="sale_section layout_padding-bottom">
        <div class="container-fluid">
            <div class="heading_container">
                <h2>
                    Aplikasi
                </h2>
                <p>
                    Daftar Aplikasi
                </p>
            </div>
            <div class="sale_container" id="applications">
                @foreach ($applications as $application)
                    <div class="box">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="img-box">
                                        <img src="{{ asset('storage/upload/kategori/' . $application->category->icon) }}"
                                            alt="aplikasi" width="200" height="200">
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
                @endforeach
            </div>
            <div class="btn-box">
                <a type="button" class="see-more" data-page="2" data-link="{{ $applications->path() }}?page="
                    data-div="#applications">
                    Muat Lebih Banyak
                </a>
            </div>
        </div>
    </section>

    <!-- end sale section -->
@endsection

@push('js')
    <script>
        $(".see-more").click(function() {
            $div = $($(this).data('div')); //div to append
            $link = $(this).data('link'); //current URL

            $page = $(this).data('page'); //get the next page #
            $href = $link + $page; //complete URL
            $.get($href, function(response) {
                //append data
                $html = $(response).find("#applications").html();
                $div.append($html);

                if (!$html.trim()) {
                    // if record not found, hide button "See More"
                    $(".see-more").hide();
                }
            });

            $(this).data('page', (parseInt($page) + 1)); //update page #
        });
    </script>
@endpush
