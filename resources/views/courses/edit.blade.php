
@extends('layouts.app')

@section('title', 'Edit Kursus')

@section('content')
<div class="container py-5">

    <section class="courses-section">

        {{-- Header Halaman --}}
        <div class="mb-4">
            <span class="section-label">DATA PEMBELAJARAN</span>

            <h1 class="courses-title mt-3">Edit Kursus</h1>

            <p class="courses-subtitle">
                Perbarui informasi kursus agar data tetap akurat dan terbaru.
            </p>
        </div>

        {{-- Notifikasi Error --}}
        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <strong>Periksa kembali data yang dimasukkan.</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Edit --}}
        <div class="card edit-card">
            <div class="card-body p-4 p-md-5">

                <div class="edit-card-header mb-4">
                    <h5>Informasi Kursus</h5>
                    <p>Silakan ubah informasi kursus pada formulir berikut.</p>
                </div>

                <form method="POST"
                      action="{{ route('courses.update', $course) }}">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        {{-- Kode Kursus --}}
                        <div class="col-md-6">
                            <label class="form-label">Kode Kursus</label>

                            <input type="text"
                                   name="code"
                                   value="{{ old('code', $course->code) }}"
                                   class="form-control edit-input @error('code') is-invalid @enderror"
                                   placeholder="Contoh: WEB-101">

                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nama Kursus --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Kursus</label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $course->name) }}"
                                   class="form-control edit-input @error('name') is-invalid @enderror"
                                   placeholder="Masukkan nama kursus">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12">
                            <label class="form-label">Deskripsi Kursus</label>

                            <textarea name="description"
                                      rows="4"
                                      class="form-control edit-input @error('description') is-invalid @enderror"
                                      placeholder="Masukkan deskripsi kursus">{{ old('description', $course->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Biaya --}}
                        <div class="col-md-6">
                            <label class="form-label">Biaya Kursus (Rp)</label>

                            <input type="number"
                                   name="fee"
                                   min="0"
                                   value="{{ old('fee', $course->fee) }}"
                                   class="form-control edit-input @error('fee') is-invalid @enderror"
                                   placeholder="Contoh: 300000">

                            @error('fee')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kuota --}}
                        <div class="col-md-6">
                            <label class="form-label">Kuota Peserta</label>

                            <input type="number"
                                   name="quota"
                                   min="1"
                                   max="500"
                                   value="{{ old('quota', $course->quota) }}"
                                   class="form-control edit-input @error('quota') is-invalid @enderror"
                                   placeholder="Jumlah peserta">

                            @error('quota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tanggal Mulai --}}
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Mulai</label>

                            <input type="date"
                                   name="start_date"
                                   value="{{ old('start_date', $course->start_date?->format('Y-m-d')) }}"
                                   class="form-control edit-input @error('start_date') is-invalid @enderror">

                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6">
                            <label class="form-label">Status Kursus</label>

                            <select name="status"
                                    class="form-select edit-input @error('status') is-invalid @enderror">

                                @foreach (['draft', 'open', 'closed'] as $value)
                                    <option value="{{ $value }}"
                                        @selected(old('status', $course->status) === $value)>
                                        {{ ucfirst($value) }}
                                    </option>
                                @endforeach

                            </select>

                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="edit-actions mt-5 pt-4">

                        <a href="{{ route('courses.show', $course) }}"
                           class="btn btn-cancel">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-purple">
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </section>

</div>
@endsection
