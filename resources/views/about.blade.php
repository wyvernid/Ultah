@extends('layouts.app')
@section('title', 'About & Harapan')

@section('content')
<section class="page-header">
    <div class="container">
        <h1 class="page-title" data-aos="fade-down">💙 About 💙</h1>
        <p class="page-subtitle" data-aos="fade-up">sampaikan harapanmu di tahun 2026 ini</p>
    </div>
</section>

<!-- Profile Card -->
<section class="profile-section">
    <div class="container">
        <div class="profile-card" data-aos="fade-up">
            <div class="profile-avatar-wrap">
                <img src="{{ asset('storage/gallery/foto1.jpeg') }}"
                     alt="Profile"
                     class="profile-avatar"
                     onerror="this.src='https://via.placeholder.com/200/e0f2fe/0284c7?text=😊'">
                <div class="profile-badge">🎂</div>
            </div>
            <div class="profile-info">
                <h2 class="profile-name">Sella Aprilia Ariibah</h2>
                <p class="profile-tagline">"Selalu bersinar, selalu menginspirasi"</p>
                <div class="profile-facts">
                    <!-- Tanggal ulang tahun (default, tidak bisa diubah) -->
                    <div class="fact-item">
                        <span class="fact-icon">🎂</span>
                        <span class="fact-label">Ultah</span>
                        <span class="fact-value">19 April 2006</span>
                    </div>

                    @if($wish && $wish->hobby)
                    <div class="fact-item fact-dynamic" data-aos="fade-up">
                        <span class="fact-icon">🎯</span>
                        <span class="fact-label">Hobi Kedepannya</span>
                        <span class="fact-value">{{ $wish->hobby }}</span>
                    </div>
                    @endif

                    @if($wish && $wish->favorite_food)
                    <div class="fact-item fact-dynamic" data-aos="fade-up">
                        <span class="fact-icon">🍜</span>
                        <span class="fact-label">Makanan Favorit</span>
                        <span class="fact-value">{{ $wish->favorite_food }}</span>
                    </div>
                    @endif

                    @if($wish && $wish->favorite_color)
                    <div class="fact-item fact-dynamic" data-aos="fade-up">
                        <span class="fact-icon">🎨</span>
                        <span class="fact-label">Warna Favorit</span>
                        <span class="fact-value">{{ $wish->favorite_color }}</span>
                    </div>
                    @endif

                    @if($wish && $wish->favorite_place)
                    <div class="fact-item fact-dynamic" data-aos="fade-up">
                        <span class="fact-icon">📍</span>
                        <span class="fact-label">Tempat Favorit</span>
                        <span class="fact-value">{{ $wish->favorite_place }}</span>
                    </div>
                    @endif

                    @if($wish && $wish->favorite_friend)
                    <div class="fact-item fact-dynamic" data-aos="fade-up">
                        <span class="fact-icon">👯</span>
                        <span class="fact-label">Teman Favorit</span>
                        <span class="fact-value">{{ $wish->favorite_friend }}</span>
                    </div>
                    @endif

                    @if($wish && $wish->favorite_partner)
                    <div class="fact-item fact-dynamic" data-aos="fade-up">
                        <span class="fact-icon">💑</span>
                        <span class="fact-label">Pasangan Favorit</span>
                        <span class="fact-value">{{ $wish->favorite_partner }}</span>
                    </div>
                    @endif

                    @if($wish && $wish->favorite_book)
                    <div class="fact-item fact-dynamic" data-aos="fade-up">
                        <span class="fact-icon">📚</span>
                        <span class="fact-label">Buku Favorit</span>
                        <span class="fact-value">{{ $wish->favorite_book }}</span>
                    </div>
                    @endif
                </div>

                <!-- Harapan: gembok tersembunyi -->
                @if($wish && $wish->message)
                <div class="wish-secret-wrap" data-aos="fade-up">
                    <div class="wish-secret-box">
                        <div class="wish-lock-icon">🔒</div>
                        <p class="wish-secret-label">Harapan ini dirahasiakan sampai tahun depan</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Form Isian -->
<section class="wish-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">Isi Tentang Kamu</h2>
            <p class="section-subtitle">Ceritain lebih banyak tentang dirimu ya!</p>
        </div>

        @if(session('success'))
        <div class="alert-success" data-aos="fade-down">
            {{ session('success') }}
        </div>
        @endif

        <div class="wish-form-wrap" data-aos="fade-up">
            <form action="{{ route('wish.store') }}" method="POST" class="wish-form">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Kamu</label>
                    <input type="text" id="name" name="name"
                           placeholder="Sapa tau Mau ganti niknem"
                           value="{{ old('name', $wish->name ?? '') }}"
                           class="{{ $errors->has('name') ? 'is-error' : '' }}"
                           maxlength="100">
                    @error('name')<span class="field-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="hobby">Hobi Kedepannya</label>
                    <input type="text" id="hobby" name="hobby"
                           placeholder="Kira kira kedepannya hobinya apa, atau tetap sama"
                           value="{{ old('hobby', $wish->hobby ?? '') }}"
                           maxlength="200">
                </div>

                <div class="form-group">
                    <label for="favorite_food">Makanan Favorit</label>
                    <input type="text" id="favorite_food" name="favorite_food"
                           placeholder="Makanan yang paling kamu suka"
                           value="{{ old('favorite_food', $wish->favorite_food ?? '') }}"
                           maxlength="100">
                </div>

                <div class="form-group">
                    <label for="favorite_color">Warna Favorit</label>
                    <input type="text" id="favorite_color" name="favorite_color"
                           placeholder="biru kan? atau mungkin berubah hehe"
                           value="{{ old('favorite_color', $wish->favorite_color ?? '') }}"
                           maxlength="100">
                </div>

                <div class="form-group">
                    <label for="favorite_place">Tempat Favorit</label>
                    <input type="text" id="favorite_place" name="favorite_place"
                           placeholder="Tempat yang paling berkesan buat kamu"
                           value="{{ old('favorite_place', $wish->favorite_place ?? '') }}"
                           maxlength="100">
                </div>

                <div class="form-group">
                    <label for="favorite_friend">Teman Favorit</label>
                    <input type="text" id="favorite_friend" name="favorite_friend"
                           placeholder="isi isi sajalah"
                           value="{{ old('favorite_friend', $wish->favorite_friend ?? '') }}"
                           maxlength="100">
                </div>

                <div class="form-group">
                    <label for="favorite_partner">Pasangan Favorit<small style="opacity:.6">(opsional wkwk)</small></label>
                    <input type="text" id="favorite_partner" name="favorite_partner"
                           placeholder="Kalau ada saja wkwk, bisa gk diisi kok"
                           value="{{ old('favorite_partner', $wish->favorite_partner ?? '') }}"
                           maxlength="100">
                </div>

                <div class="form-group">
                    <label for="favorite_book">Buku Favorit</label>
                    <input type="text" id="favorite_book" name="favorite_book"
                           placeholder="Buku yang paling berkesan buat kamu"
                           value="{{ old('favorite_book', $wish->favorite_book ?? '') }}"
                           maxlength="100">
                </div>

                <div class="form-group">
                    <label for="message">Harapan di 2026 🔒 <small style="opacity:.6">(rahasia, hanya kamu yang tahu)</small></label>
                    <textarea id="message" name="message"
                              placeholder="Tuliskan harapan terbesarmu tahun 2026 ini,aman saja tulis apa saja bebas, ini rahasia cuma kamu yang tau, gaada yang bisa buka sampai tahun depan"
                              rows="5"
                              class="{{ $errors->has('message') ? 'is-error' : '' }}"
                              ></textarea>
                    <span class="char-count" id="charCount">{{ strlen(old('message', '')) }}</span>
                    @error('message')<span class="field-error">{{ $message }}</span>@enderror
                </div>

                <button type="submit" class="btn-submit">
                    <span>Simpan</span> 
                </button>
            </form>
        </div>
    </div>
</section>

<style>
.fact-item {
    display: flex;
    align-items: center;
    gap: .5rem;
    padding: .4rem 0;
}
.fact-label {
    font-size: .8rem;
    opacity: .7;
    min-width: 120px;
}
.fact-value {
    font-weight: 600;
}
.wish-secret-wrap {
    margin-top: 1.5rem;
}
.wish-secret-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: .5rem;
    padding: 1.2rem 2rem;
    border: 2px dashed rgba(2,132,199,.3);
    border-radius: 1rem;
    background: rgba(224,242,254,.15);
    text-align: center;
}
.wish-lock-icon {
    font-size: 2.5rem;
    animation: sway 3s ease-in-out infinite;
}
@keyframes sway {
    0%,100% { transform: rotate(-5deg); }
    50%      { transform: rotate(5deg); }
}
.wish-secret-label {
    font-size: .85rem;
    opacity: .75;
    font-style: italic;
    margin: 0;
}
</style>

@push('scripts')
<script>
const msgArea = document.getElementById('message');
const counter = document.getElementById('charCount');
if (msgArea) {
    msgArea.addEventListener('input', () => {
        counter.textContent = msgArea.value.length;
    });
}
</script>
@endpush
@endsection