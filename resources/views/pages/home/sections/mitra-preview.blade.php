@if (!empty($mitra))
    <section class="mitra-preview section section-muted" id="mitra">
        <div class="container">
            <div class="section-heading mitra-preview-heading">
                <p class="eyebrow">MITRA KAMI</p>
                <h2 class="section-title">Dipercaya oleh berbagai mitra</h2>
                <p class="section-description">Kolaborasi dan kepercayaan menjadi bagian penting dalam setiap proyek kami.</p>
            </div>

            <div class="mitra-preview-grid">
                @foreach ($mitra as $partner)
                    <article class="mitra-preview-card">
                        @if ($partner['image'])
                            <img src="{{ $partner['image'] }}" alt="Logo {{ $partner['name'] }}" loading="lazy">
                        @else
                            <span class="mitra-preview-placeholder" aria-hidden="true">{{ mb_substr($partner['name'], 0, 1) }}</span>
                        @endif
                        <h3>{{ $partner['name'] }}</h3>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
