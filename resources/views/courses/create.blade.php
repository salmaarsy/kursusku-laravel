
@extends('layouts.app')

@section('title', 'Tambah Kursus')

@section('content')

<div class="container py-5">

    <section class="courses-section">

        <!-- Judul halaman -->
        <div class="mb-4">
            <span class="section-label">DATA PEMBELAJARAN</span>

            <h1 class="courses-title mt-3">
                Tambah Kursus
            </h1>

            <p class="courses-subtitle">
                Silakan isi formulir berikut untuk menambahkan kursus baru.
            </p>
        </div>

        <!-- Formulir -->
        <div class="card form-card">
            <div class="card-body p-4 p-md-5">

                <!-- Pesan validasi keseluruhan -->
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <strong>Terjadi kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf

                    <!-- Kode Kursus -->
                    <div class="mb-4">
                        <label for="code" class="form-label">
                            Kode Kursus
                        </label>

                        <input
                            type="text"
                            name="code"
                            id="code"
                            class="form-control @error('code') is-invalid @enderror"
                            value="{{ old('code') }}"
                            placeholder="Contoh: WEB-101"
                        >

                        @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Nama Kursus -->
                    <div class="mb-4">
                        <label for="name" class="form-label">
                            Nama Kursus
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama kursus"
                        >

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="description" class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Masukkan deskripsi kursus"
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Biaya -->
                    <div class="mb-4">
                        <label for="fee" class="form-label">
                            Biaya Kursus (Rp)
                        </label>

                        <input
                            type="number"
                            name="fee"
                            id="fee"
                            class="form-control @error('fee') is-invalid @enderror"
                            value="{{ old('fee', 0) }}"
                            placeholder="Masukkan biaya kursus"
                        >

                        @error('fee')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Kuota -->
                    <div class="mb-4">
                        <label for="quota" class="form-label">
                            Kuota Peserta
                        </label>

                        <input
                            type="number"
                            name="quota"
                            id="quota"
                            class="form-control @error('quota') is-invalid @enderror"
                            value="{{ old('quota') }}"
                            placeholder="Masukkan jumlah kuota"
                        >

                        @error('quota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Tanggal Mulai -->
                    <div class="mb-4">
                        <label for="start_date" class="form-label">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            id="start_date"
                            class="form-control @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date') }}"
                        >

                        @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="form-label">
                            Status Kursus
                        </label>

                        <select
                            name="status"
                            id="status"
                            class="form-select @error('status') is-invalid @enderror"
                        >
                            <option value="">Pilih Status</option>

                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>
                                Open
                            </option>

                            <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>
                                Closed
                            </option>
                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-3 flex-wrap mt-5">

                        <button type="submit" class="btn btn-purple">
                            Simpan Kursus
                        </button>

                        <a href="{{ route('courses.index') }}" class="btn btn-back">
                            Kembali
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </section>

</div>

@endsection
