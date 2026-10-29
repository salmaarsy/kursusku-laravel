
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $siteName }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <header class="navbar">
        <div class="container">
            <strong>{{ $siteName }}</strong>
            <nav>
                <a href="{{ route('home') }}" style="color:white">
                    Beranda
                </a>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="hero">
            <div>
                <p>Belajar Web Secara Bertahap</p>
                <h1>Bangun kemampuan web dari PHP sampai Laravel.</h1>
                <p>KursusKu menyediakan latihan terarah untuk pemula.</p>
            </div>

            <img src="{{ asset('images/hero-kursus.jpeg') }}"
                 alt="Ilustrasi kelas KursusKu">
        </section>

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

                <a href="#katalog" class="card-link">
                    Pelajari Kursus <span>→</span>
                </a>
            </article>
        @endforeach
    </div>
</section>