@extends('layouts.app')
@section('title', 'Galeri Kenangan')

@section('content')
<section class="page-header">
    <div class="container">
        <h1 class="page-title" data-aos="fade-down">📸 Galeri Kenangan</h1>
        <p class="page-subtitle" data-aos="fade-up">Setiap foto menyimpan cerita yang tak ternilai</p>
    </div>
</section>

<section class="gallery-section">
    <div class="container">
        @if($photos->isNotEmpty())
        <!-- Masonry Grid -->
        <div class="gallery-grid" id="galleryGrid">
            @foreach($photos as $photo)
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="gallery-thumb">
                    <img src="{{ asset('storage/' . $photo->photo_path) }}" 
                         alt="{{ $photo->title ?? 'Foto kenangan' }}"
                         loading="lazy"
                         onclick="openLightbox('{{ asset('storage/' . $photo->photo_path) }}', '{{ $photo->title }}', '{{ $photo->caption }}')"
                         onerror="this.parentElement.parentElement.style.display='none'">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            @if($photo->title)<h4>{{ $photo->title }}</h4>@endif
                            @if($photo->caption)<p>{{ $photo->caption }}</p>@endif
                        </div>
                        <div class="gallery-zoom">🔍</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="gallery-empty" data-aos="fade-up">
            <div class="empty-icon">📷</div>
            <p>Foto sedang dikumpulkan...</p>
        </div>
        @endif
    </div>
</section>

<!-- Lightbox Modal -->
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <button class="lightbox-close" onclick="closeLightbox()">✕</button>
        <img id="lightboxImg" src="" alt="">
        <div class="lightbox-caption">
            <h4 id="lightboxTitle"></h4>
            <p id="lightboxCaption"></p>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openLightbox(src, title, caption) {
    document.getElementById('lightboxImg').src = src;
    document.getElementById('lightboxTitle').textContent = title || '';
    document.getElementById('lightboxCaption').textContent = caption || '';
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if(e.key === 'Escape') closeLightbox(); });


{{ asset('storage/gallery/foto1.jpeg') }}
</script>
@endpush
@endsection