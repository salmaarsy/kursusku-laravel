@extends('layouts.app')

@section('title', 'Detail Kursus')

@section('content')
<div class="container py-5">

    <section class="courses-section course-detail-section">

        {{-- Notifikasi Berhasil Update --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4"
                 role="alert">
                <strong>Berhasil!</strong>
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>
            </div>
        @endif

        {{-- Header --}}
        <div class="mb-4">
            <span class="section-label">INFORMASI PEMBELAJARAN</span>

            <h1 class="courses-title mt-3">
                Detail Kursus
            </h1>

            <p class="courses-subtitle">
                Informasi lengkap mengenai kursus yang tersedia di KursusKu.
            </p>
        </div>

        {{-- Card Detail Kursus --}}
        <div class="course-detail-card">

            <div class="course-detail-heading">
                <div>
                    <span class="course-detail-label">INFORMASI KURSUS</span>
                    <h2>{{ $course->name }}</h2>
                    <p>Kode Kursus: {{ $course->code }}</p>
                </div>

                <span class="status-badge">
                    {{ ucfirst($course->status) }}
                </span>
            </div>

            <div class="course-detail-divider"></div>

            {{-- Informasi --}}
            <div class="course-detail-grid">

                <div class="detail-item">
                    <span class="detail-label">Kode Kursus</span>
                    <span class="detail-value">{{ $course->code }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Nama Kursus</span>
                    <span class="detail-value">{{ $course->name }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Biaya Kursus</span>
                    <span class="detail-value">
                        Rp {{ number_format($course->fee, 0, ',', '.') }}
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Kuota Peserta</span>
                    <span class="detail-value">
                        {{ $course->quota }} Peserta
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Tanggal Mulai</span>
                    <span class="detail-value">
                        {{ $course->start_date?->format('d-m-Y') ?? '-' }}
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Status Kursus</span>
                    <span class="detail-value">
                        {{ ucfirst($course->status) }}
                    </span>
                </div>

                <div class="detail-item detail-description">
                    <span class="detail-label">Deskripsi Kursus</span>
                    <span class="detail-value">
                        {{ $course->description ?: '-' }}
                    </span>
                </div>

            </div>

            {{-- Tombol --}}
            <div class="course-detail-actions">

                <a href="{{ route('courses.index') }}"
                   class="btn-back">
                    ← Kembali
                </a>

                <a href="{{ route('courses.edit', $course) }}"
                   class="btn-purple">
                    Edit Kursus →
                </a>

            </div>

        </div>

    </section>

</div>
@endsection
