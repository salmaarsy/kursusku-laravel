@extends('layouts.app')

@section('title', 'Beranda - KursusKu')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

<main class="container">

    <!-- Bagian Hero -->
    <section class="hero">
        <div class="hero-content">
            <p class="hero-label">Belajar Web Secara Bertahap</p>

            <h1>Bangun kemampuan web dari PHP sampai Laravel.</h1>

            <p class="hero-description">
                KursusKu menyediakan latihan terarah untuk pemula.
            </p>

            <a href="{{ route('enrollments.create') }}" class="card-link">
                Daftar Kursus →
            </a>
        </div>

        <div class="hero-image">
            <img
                src="{{ asset('images/hero-kursus.jpeg') }}"
                alt="Ilustrasi kelas KursusKu">
        </div>
    </section>

    <!-- Katalog Kursus -->
    <section class="courses" id="katalog">

        <div class="section-heading">
            <span class="subtitle">PILIH KURSUSMU</span>

            <h2>Kursus Pilihan</h2>

            <p>
                Tingkatkan kemampuan digitalmu melalui materi
                yang mudah dipahami dan latihan terarah.
            </p>
        </div>

        <div class="course-grid">

            @foreach ($featured as $course)
                <article class="card">

                    <div class="card-icon">
                        @if (str_contains(strtolower($course['name']), 'web'))
                            &lt;/&gt;
                        @elseif (str_contains(strtolower($course['name']), 'php'))
                            PHP
                        @elseif (str_contains(strtolower($course['name']), 'laravel'))
                            L
                        @else
                            ✦
                        @endif
                    </div>

                    <small>{{ $course['code'] }}</small>

                    <h3>{{ $course['name'] }}</h3>

                    <p>{{ $course['description'] }}</p>

                    <a href="{{ route('enrollments.create') }}" class="card-link">
                        Pelajari Kursus →
                    </a>

                </article>
            @endforeach

        </div>
    </section>

</main>

@endsection