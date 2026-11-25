@php
    $cars = $cars ?? [
        [
            'name' => 'Avanza Veloz',
            'brand' => 'Toyota',
            'year' => 2023,
            'transmission' => 'Matic',
            'capacity' => 7,
            'price_per_day' => 450000,
            'available' => true,
            'category' => 'MPV',
            'image' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?auto=format&fit=crop&w=900&q=80',
        ],
        [
            'name' => 'Brio RS',
            'brand' => 'Honda',
            'year' => 2022,
            'transmission' => 'Matic',
            'capacity' => 5,
            'price_per_day' => 350000,
            'available' => true,
            'category' => 'City Car',
            'image' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&w=900&q=80',
        ],
        [
            'name' => 'Xpander Ultimate',
            'brand' => 'Mitsubishi',
            'year' => 2023,
            'transmission' => 'Matic',
            'capacity' => 7,
            'price_per_day' => 550000,
            'available' => false,
            'category' => 'MPV',
            'image' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=900&q=80',
        ],
        [
            'name' => 'Innova Zenix',
            'brand' => 'Toyota',
            'year' => 2024,
            'transmission' => 'Matic',
            'capacity' => 7,
            'price_per_day' => 850000,
            'available' => true,
            'category' => 'Premium MPV',
            'image' => 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=900&q=80',
        ],
    ];
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sewa mobil nyaman dan terpercaya untuk perjalanan Anda. Pilih armada, tentukan jadwal, dan berangkat dengan tenang.">
    <title>{{ config('app.name', 'Jalanin') }} — Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #17243b;
            --muted: #657187;
            --brand: #174b9b;
            --brand-dark: #10366f;
            --accent: #f3a712;
            --surface: #f5f8fc;
        }

        body {
            color: var(--ink);
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
        }

        .navbar {
            background: rgba(255, 255, 255, .97);
        }

        .navbar-brand {
            color: var(--brand);
            font-weight: 800;
            letter-spacing: -.04em;
        }

        .brand-mark {
            display: inline-grid;
            width: 2rem;
            height: 2rem;
            margin-right: .4rem;
            place-items: center;
            border-radius: .7rem;
            background: var(--brand);
            color: #fff;
            font-size: 1rem;
            vertical-align: middle;
        }

        .nav-link {
            color: var(--muted);
            font-weight: 600;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: var(--brand);
        }

        .btn-primary {
            --bs-btn-bg: var(--brand);
            --bs-btn-border-color: var(--brand);
            --bs-btn-hover-bg: var(--brand-dark);
            --bs-btn-hover-border-color: var(--brand-dark);
            --bs-btn-active-bg: var(--brand-dark);
            --bs-btn-active-border-color: var(--brand-dark);
        }

        .hero {
            overflow: hidden;
            padding: 5.5rem 0 4.5rem;
            background:
                radial-gradient(ellipse at 87% 14%, rgba(243, 167, 18, .16), transparent 28%),
                linear-gradient(135deg, #f3f7fd 0%, #fff 58%, #eef4fc 100%);
        }

        .hero h1 {
            max-width: 700px;
            font-size: clamp(2.5rem, 5vw, 4.2rem);
            font-weight: 800;
            letter-spacing: -.055em;
            line-height: 1.08;
        }

        .text-brand {
            color: var(--brand);
        }

        .hero-copy {
            max-width: 590px;
            color: var(--muted);
            font-size: 1.1rem;
            line-height: 1.75;
        }

        .hero-visual {
            position: relative;
            display: grid;
            min-height: 320px;
            place-items: center;
        }

        .hero-circle {
            display: grid;
            width: min(80vw, 330px);
            aspect-ratio: 1;
            place-items: center;
            border: 1px solid rgba(23, 75, 155, .12);
            border-radius: 50%;
            background: radial-gradient(circle, #fff 20%, #e8f0fb 70%, #dce8f8 100%);
            box-shadow: 0 28px 70px rgba(23, 55, 102, .12);
            font-size: clamp(6rem, 14vw, 9.5rem);
        }

        .hero-note {
            position: absolute;
            right: 0;
            bottom: 1.2rem;
            padding: .8rem 1rem;
            border: 1px solid #edf0f4;
            border-radius: 1rem;
            background: #fff;
            box-shadow: 0 12px 30px rgba(23, 36, 59, .1);
            font-size: .9rem;
            font-weight: 700;
        }

        .search-panel {
            position: relative;
            z-index: 1;
            margin-top: 2rem;
            padding: 1.35rem;
            border: 1px solid #edf0f4;
            border-radius: 1.1rem;
            background: #fff;
            box-shadow: 0 18px 50px rgba(23, 36, 59, .09);
        }

        .form-label {
            color: var(--ink);
            font-size: .82rem;
            font-weight: 700;
        }

        .form-control,
        .form-select {
            min-height: 46px;
            border-color: #e2e7ef;
        }

        .section-space {
            padding: 5rem 0;
        }

        .section-kicker {
            color: var(--brand);
            font-size: .78rem;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .section-title {
            font-weight: 800;
            letter-spacing: -.04em;
        }

        .section-copy {
            color: var(--muted);
        }

        .car-card {
            overflow: hidden;
            height: 100%;
            border: 1px solid #edf0f4;
            border-radius: 1rem;
            box-shadow: 0 8px 26px rgba(23, 36, 59, .045);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .car-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 36px rgba(23, 36, 59, .1);
        }

        .car-image {
            width: 100%;
            height: 210px;
            object-fit: cover;
            background: linear-gradient(135deg, #eaf1fa, #dce7f5);
        }

        .place-items-center {
            place-items: center;
        }

        .car-brand {
            color: var(--muted);
            font-size: .85rem;
            font-weight: 600;
        }

        .car-title {
            font-size: 1.2rem;
            font-weight: 800;
        }

        .car-specs {
            color: var(--muted);
            font-size: .83rem;
        }

        .price {
            color: var(--brand);
            font-size: 1.2rem;
            font-weight: 800;
        }

        .benefit-card {
            height: 100%;
            padding: 1.5rem;
            border: 1px solid #edf0f4;
            border-radius: 1rem;
            background: #fff;
        }

        .benefit-icon {
            display: grid;
            width: 3rem;
            height: 3rem;
            margin-bottom: 1rem;
            place-items: center;
            border-radius: .9rem;
            background: #eaf1fb;
            font-size: 1.35rem;
        }

        .how-section {
            background: var(--surface);
        }

        .step-number {
            display: grid;
            width: 2.4rem;
            height: 2.4rem;
            flex: 0 0 auto;
            place-items: center;
            border-radius: 50%;
            background: var(--brand);
            color: #fff;
            font-weight: 800;
        }

        footer {
            background: #14233b;
            color: #d7dfeb;
        }

        footer a {
            color: #d7dfeb;
            text-decoration: none;
        }

        footer a:hover {
            color: #fff;
        }

        @media (max-width: 991.98px) {
            .hero {
                padding-top: 4rem;
            }

            .hero-visual {
                min-height: 270px;
                margin-top: 1rem;
            }

            .hero-note {
                right: 8%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top border-bottom">
        <div class="container">
            <a class="navbar-brand" href="#beranda" aria-label="Jalanin, beranda">
                <span class="brand-mark" aria-hidden="true">J</span>jalanin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="Buka navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav mx-auto my-3 my-lg-0 gap-lg-3">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#armada">Armada Mobil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cara-sewa">Cara Sewa</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2 pb-3 pb-lg-0">
                    @auth
                        <span class="me-2 fw-semibold">{{ auth()->user()->name }}</span>
                        @if (Route::has('logout'))
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-outline-primary btn-sm px-3" type="submit">Keluar</button>
                            </form>
                        @endif
                    @else
                        <a class="btn btn-outline-primary btn-sm px-3" href="{{ Route::has('login') ? route('login') : url('/login') }}">Login</a>
                        <a class="btn btn-primary btn-sm px-3" href="{{ Route::has('register') ? route('register') : url('/register') }}">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        <section class="hero" id="beranda">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span class="badge rounded-pill text-bg-warning px-3 py-2 mb-3">Perjalanan nyaman dimulai di sini</span>
                        <h1>Jalan lebih jauh,<br><span class="text-brand">tanpa banyak pikir.</span></h1>
                        <p class="hero-copy mt-3 mb-4">Temukan mobil yang pas untuk setiap rencana. Armada terawat, harga transparan, dan proses sewa yang praktis.</p>
                        <a class="btn btn-primary btn-lg px-4" href="#armada">Lihat Armada <span aria-hidden="true">&rarr;</span></a>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero-visual" aria-hidden="true">
                            <div class="hero-circle">🚙</div>
                            <div class="hero-note">⭐ 4.9/5 · Dipercaya pelanggan</div>
                        </div>
                    </div>
                </div>

                <form class="search-panel" action="{{ url()->current() }}" method="GET" aria-label="Cari mobil">
                    <div class="row align-items-end g-3">
                        <div class="col-12 col-md-6 col-lg-3">
                            <label class="form-label" for="start_date">Tanggal mulai</label>
                            <input class="form-control" id="start_date" name="start_date" type="date" value="{{ request('start_date') }}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <label class="form-label" for="end_date">Tanggal selesai</label>
                            <input class="form-control" id="end_date" name="end_date" type="date" value="{{ request('end_date') }}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <label class="form-label" for="category">Kategori / kapasitas</label>
                            <select class="form-select" id="category" name="category">
                                <option value="">Semua mobil</option>
                                <option value="city-car" @selected(request('category') === 'city-car')>City car · 4–5 penumpang</option>
                                <option value="mpv" @selected(request('category') === 'mpv')>MPV · 6–7 penumpang</option>
                                <option value="premium" @selected(request('category') === 'premium')>Premium · 6+ penumpang</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 d-grid">
                            <button class="btn btn-primary btn-lg" type="submit">Cari Mobil</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="section-space" id="armada">
            <div class="container">
                <div class="row align-items-end mb-4">
                    <div class="col-md-8">
                        <span class="section-kicker">Pilihan untuk perjalananmu</span>
                        <h2 class="section-title display-6 mt-2 mb-2">Armada favorit</h2>
                        <p class="section-copy mb-0">Pilih mobil yang paling cocok untuk rencana perjalanan Anda.</p>
                    </div>
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <a class="fw-bold text-brand text-decoration-none" href="#kontak">Butuh rekomendasi? <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>

                <div class="row g-4">
                    @forelse ($cars as $car)
                        <div class="col-12 col-md-6 col-xl-3">
                            <article class="card car-card">
                                @if (!empty($car['image']))
                                    <img class="car-image" src="{{ $car['image'] }}" alt="{{ $car['brand'] }} {{ $car['name'] }}" loading="lazy">
                                @else
                                    <div class="car-image d-grid place-items-center text-center p-4" role="img" aria-label="Foto {{ $car['brand'] }} {{ $car['name'] }}">
                                        <span class="display-2" aria-hidden="true">🚘</span>
                                    </div>
                                @endif
                                <div class="card-body d-flex flex-column p-3 p-lg-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="car-brand">{{ $car['brand'] }}</span>
                                        @if ($car['available'])
                                            <span class="badge rounded-pill text-bg-success-subtle text-success-emphasis">Tersedia</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-secondary-subtle text-secondary-emphasis">Disewa</span>
                                        @endif
                                    </div>
                                    <h3 class="car-title mb-3">{{ $car['name'] }}</h3>
                                    <p class="car-specs mb-3">{{ $car['year'] }} <span aria-hidden="true">·</span> {{ $car['transmission'] }} <span aria-hidden="true">·</span> {{ $car['capacity'] }} penumpang</p>
                                    <div class="mt-auto">
                                        <div class="d-flex justify-content-between align-items-end mb-3">
                                            <div>
                                                <span class="price">Rp{{ number_format($car['price_per_day'], 0, ',', '.') }}</span>
                                                <span class="car-specs">/ hari</span>
                                            </div>
                                        </div>
                                        @if ($car['available'])
                                            <a class="btn btn-primary w-100" href="#kontak">Detail / Sewa</a>
                                        @else
                                            <button class="btn btn-outline-secondary w-100" type="button" disabled>Sedang Disewa</button>
                                        @endif
                                    </div>
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-light border mb-0">Belum ada armada yang tersedia. Silakan cek kembali nanti.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="section-space how-section" id="cara-sewa">
            <div class="container">
                <div class="text-center mx-auto mb-5" style="max-width: 620px;">
                    <span class="section-kicker">Mudah dari awal sampai jalan</span>
                    <h2 class="section-title display-6 mt-2 mb-2">Sewa mobil tanpa ribet</h2>
                    <p class="section-copy mb-0">Semua yang Anda butuhkan untuk memulai perjalanan, dalam beberapa langkah sederhana.</p>
                </div>
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="benefit-card">
                            <div class="benefit-icon" aria-hidden="true">🚗</div>
                            <h3 class="h5 fw-bold">Armada terawat</h3>
                            <p class="section-copy mb-0">Setiap mobil diperiksa dan dibersihkan sebelum digunakan.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="benefit-card">
                            <div class="benefit-icon" aria-hidden="true">💳</div>
                            <h3 class="h5 fw-bold">Harga transparan</h3>
                            <p class="section-copy mb-0">Biaya sewa jelas sejak awal, tanpa biaya tersembunyi.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="benefit-card">
                            <div class="benefit-icon" aria-hidden="true">🕒</div>
                            <h3 class="h5 fw-bold">Proses praktis</h3>
                            <p class="section-copy mb-0">Pilih mobil dan jadwal, lalu konfirmasi pemesanan Anda.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="benefit-card">
                            <div class="benefit-icon" aria-hidden="true">🤝</div>
                            <h3 class="h5 fw-bold">Siap membantu</h3>
                            <p class="section-copy mb-0">Tim kami siap membantu jika Anda butuh informasi atau bantuan.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center g-4 mt-4">
                    <div class="col-12 col-md-4">
                        <div class="d-flex gap-3">
                            <span class="step-number">1</span>
                            <div><h3 class="h6 fw-bold mb-1">Pilih mobil & jadwal</h3><p class="section-copy small mb-0">Tentukan armada dan tanggal perjalanan Anda.</p></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="d-flex gap-3">
                            <span class="step-number">2</span>
                            <div><h3 class="h6 fw-bold mb-1">Konfirmasi pemesanan</h3><p class="section-copy small mb-0">Hubungi tim kami untuk konfirmasi ketersediaan.</p></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="d-flex gap-3">
                            <span class="step-number">3</span>
                            <div><h3 class="h6 fw-bold mb-1">Mobil siap digunakan</h3><p class="section-copy small mb-0">Selesaikan administrasi dan nikmati perjalanan.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="pt-5 pb-4" id="kontak">
        <div class="container">
            <div class="row g-4 pb-4">
                <div class="col-12 col-lg-5">
                    <a class="navbar-brand text-white" href="#beranda"><span class="brand-mark">J</span>jalanin</a>
                    <p class="mt-3 mb-0" style="max-width: 380px; color: #bac6d8;">Teman perjalanan yang membuat setiap perjalanan terasa lebih mudah dan nyaman.</p>
                </div>
                <div class="col-6 col-lg-3">
                    <h2 class="h6 text-white fw-bold">Hubungi kami</h2>
                    <p class="mb-2"><a href="tel:+62215550123">+62 21 555 0123</a></p>
                    <p class="mb-0"><a href="mailto:halo@jalanin.example">halo@jalanin.example</a></p>
                </div>
                <div class="col-6 col-lg-4">
                    <h2 class="h6 text-white fw-bold">Jam operasional</h2>
                    <p class="mb-1">Senin – Sabtu: 08.00 – 20.00</p>
                    <p class="mb-0">Minggu & hari libur: 09.00 – 17.00</p>
                </div>
            </div>
            <div class="border-top pt-3 d-flex flex-column flex-md-row justify-content-between gap-2 small" style="border-color: rgba(255,255,255,.16) !important; color: #bac6d8;">
                <span>&copy; {{ date('Y') }} Jalanin Rental Mobil. Semua hak dilindungi.</span>
                <span>Perjalanan nyaman, kapan saja.</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
