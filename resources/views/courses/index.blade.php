
@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')
<div class="container py-5">

    <section class="courses-section">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div>
                <span class="section-label">DATA PEMBELAJARAN</span>
                <h1 class="courses-title mt-3">Daftar Kursus</h1>
                <p class="courses-subtitle">
                    Kelola dan lihat semua kursus yang tersedia di KursusKu.
                </p>
            </div>

            <a href="{{ route('courses.create') }}" class="btn btn-purple">
                + Tambah Kursus
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="card table-card">
            <div class="card-body p-4">

                <div class="table-responsive">
                    <table class="table table-hover align-middle course-table">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kursus</th>
                                <th>Nama Kursus</th>
                                <th>Biaya</th>
                                <th>Kuota</th>
                                <th>Tanggal Mulai</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $course->code }}</td>

                                    <td class="fw-semibold">
                                        {{ $course->name }}
                                    </td>

                                    <td>
                                        Rp{{ number_format($course->fee, 0, ',', '.') }}
                                    </td>

                                    <td>{{ $course->quota }}</td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($course->start_date)->format('d-m-Y') }}
                                    </td>

                                    <td>
                                        <span class="status-badge">
                                            {{ ucfirst($course->status) }}
                                        </span>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        Belum ada data kursus.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </section>
</div>
@endsection
