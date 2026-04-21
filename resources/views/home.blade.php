@extends('layouts.app')
@section('title', 'Selamat Ulang Tahun 🎂')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-particles">
        @for ($i = 0; $i < 20; $i++)
            <div class="particle" style="left:{{ rand(0,100) }}%;animation-delay:{{ rand(0,50)/10 }}s;animation-duration:{{ rand(30,70)/10 }}s"></div>
        @endfor
    </div>

    <div class="hero-content" data-aos="fade-up">
        <div class="hero-badge">🎂 Special Day</div>
        <h1 class="hero-title">Selamat Ulang Tahun</h1>
        <h2 class="hero-subtitle">Sella Aprilia Ariibah</h2>
        <p class="hero-tagline">Semoga hari ini dan setiap hari membawa kebahagiaan yang tak terhingga</p>
        <div class="hero-divider">
            <span>✦</span><span>✦</span><span>✦</span>
        </div>
    </div>
</section>

<!-- Message Section -->
<section class="message-section">
    <div class="container">
        <div class="message-card" data-aos="fade-right">
            <div class="message-photo-wrapper">
                <img src="{{ asset('storage/gallery/foto9.jpeg') }}" 
                     alt="Foto spesial" 
                     class="message-photo"
                     onerror="this.src='https://via.placeholder.com/400x500/e0f2fe/0284c7?text=📸'">
                <div class="photo-frame-deco"></div>
            </div>
            <div class="message-text" data-aos="fade-left">
                <div class="message-icon">💌</div>
                <h2 class="section-title">Pesan Untukmu</h2>
                <p class="message-paragraph">
                    Yeyyyy habede habede, sempga semoga nya ikut yang kamu mau saja. Selamat Ulang tahunnnnnn💙💙💙💙💙💙
                </p>
                <p class="message-paragraph">
                    Semoga setiap mimpi yang kamu rajut bisa terwujud satu persatu, semoga kesehatan selalu menyertaimu, 
                    dan semoga kebahagiaan tak pernah jauh darimu. Kamu layak mendapatkan semua hal terbaik di dunia ini.
                </p>
                <p class="message-paragraph">
                    Teruslah bersinar seperti bintang yang selalu menjadi terang, hangat, dan tak tergantikan. 
                    Selamat bertambah usia, semoga semakin bijaksana dan bahagia! 🎉
                </p>
                <p class="message-paragraph">
                    Maap telat lama, tugas numpuk
                </p>
                <div class="message-signature">
                    <span>— from me ✨</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Letter / Download Section -->
<section class="letter-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">📬 Kotak Surat</h2>
            <p class="section-subtitle">Smol Gift For U</p>
        </div>

        <div class="letter-grid">
            @forelse($downloadFiles as $file)
            <div class="letter-card" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="letter-icon">
                    @if($file->file_type === 'pdf') 📄
                    @elseif(in_array($file->file_type, ['jpg','jpeg'])) 🖼️
                    @else 📎 @endif
                </div>
                <h3 class="letter-title">{{ $file->title }}</h3>
                @if($file->description)
                    <p class="letter-desc">{{ $file->description }}</p>
                @endif
                <a href="{{ asset('storage/' . $file->file_path) }}" 
                   download 
                   class="btn-download">
                    <span class="btn-icon">⬇</span> Download Disini
                </a>
            </div>
            @empty
            <div class="letter-empty">
                <p>Gift sedang disiapkan... 🕊️</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection