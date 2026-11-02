@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')

<div class="enrollment-page">

    <div class="enrollment-wrapper">

        {{-- Header Formulir --}}
        <div class="enrollment-header">
            <span class="enrollment-subtitle">✦ KURSUSKU</span>

            <h1>Pendaftaran Kursus</h1>

            <p>
                Mulai perjalanan belajar Anda bersama KursusKu.
                Pilih kursus yang sesuai dengan minat dan kebutuhan Anda.
            </p>
        </div>

        {{-- Formulir --}}
        <div class="enrollment-panel">

            <div class="enrollment-panel-heading">
                <h2>Formulir Pendaftaran</h2>
                <p>Lengkapi informasi berikut dengan benar.</p>
            </div>

            <form method="POST" action="{{ route('enrollments.preview') }}">
                @csrf

                {{-- Nama --}}
                <div class="enrollment-field">
                    <label for="name">Nama Lengkap</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Masukkan nama lengkap Anda"
                        required
                    >

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="enrollment-field">
                    <label for="email">Alamat Email</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="contoh@email.com"
                        required
                    >

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Pilihan Kursus --}}
                <div class="enrollment-field">
                    <label for="course_id">Pilih Kursus</label>

                    <select
                        id="course_id"
                        name="course_id"
                        class="form-select @error('course_id') is-invalid @enderror"
                        required
                    >
                        <option value="">-- Pilih Kursus --</option>

                        @foreach ($courses as $id => $course)
                            <option
                                value="{{ $id }}"
                                @selected(old('course_id') == $id)
                            >
                                {{ $course['name'] }}
                            </option>
                        @endforeach

                    </select>

                    @error('course_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Ketersediaan Kursi --}}
                <div
                    id="availability"
                    class="enrollment-availability"
                    role="status"
                >
                    <span>✦</span>
                    Pilih kursus untuk melihat sisa kursi yang tersedia.
                </div>

                {{-- Pesan Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Periksa kembali data Anda!</strong>

                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Tombol --}}
                <div class="enrollment-actions">

                    <a href="{{ url('/') }}" class="enrollment-back">
                        Kembali
                    </a>

                    <button type="submit" class="enrollment-submit">
                        Kirim Pendaftaran <span>→</span>
                    </button>

                </div>

            </form>
        </div>

        {{-- Footer --}}
        <div class="enrollment-footer">
            © {{ date('Y') }} KursusKu. Belajar dan berkembang bersama.
        </div>

    </div>

</div>

@endsection
