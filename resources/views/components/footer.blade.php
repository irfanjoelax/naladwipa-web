<footer id="footer" class="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <h3 class="footer-heading">Tentang {{ env('APP_NAME') }}</h3>
                    <p>
                        {{ $information->about }}
                    </p>
                    <p><a href="{{ url('/about') }}" class="footer-link-more">Lihat Selengkapnya</a></p>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Menu Navigasi</h3>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ url('/') }}" class="text-dark"><i class="bi bi-chevron-right"></i>
                                Beranda</a></li>
                        <li><a href="{{ url('/about') }}"><i class="bi bi-chevron-right"></i> Tentang</a></li>
                        <li><a href="{{ url('/essay') }}"><i class="bi bi-chevron-right"></i> Esai</a></li>
                        <li><a href="{{ url('/film') }}"><i class="bi bi-chevron-right"></i> Film</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Program Kami</h3>
                    <ul class="footer-links list-unstyled">
                        @foreach ($programs as $program)
                            <li>
                                <a href="{{ url('program/' . $program->slug) }}">
                                    <i class="bi bi-chevron-right"></i> {{ $program->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3 class="footer-heading">Esai Terbaru</h3>

                    <ul class="footer-links footer-blog-entry list-unstyled">
                        @foreach ($essays as $essay)
                            <li>
                                <a href="{{ url('essay/' . $essay->slug) }}" class="d-flex align-items-center">
                                    <div>
                                        <div class="post-meta d-block">
                                            <span class="date">{{ Str::substr($essay->created_at, 0, 10) }}</span>
                                        </div>
                                        <span>{{ $essay->title }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <div class="copyright">
                        {{ date('Y') }} © Copyright <strong><span>{{ env('APP_NAME') }}</span></strong>. All
                        Rights
                        Reserved
                    </div>
                    <div class="credits">
                        Powered by <a href="https://wa.me/+6283140617623">{{ env('APP_COPYRIGHT') }}</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                        <a href="{{ $information->twitter }}" target="_blank" class="twitter"><i
                                class="bi bi-twitter"></i></a>
                        <a href="{{ $information->facebook }}" target="_blank" class="facebook"><i
                                class="bi bi-facebook"></i></a>
                        <a href="{{ $information->instagram }}" target="_blank" class="instagram"><i
                                class="bi bi-instagram"></i></a>
                        <a href="{{ $information->youtube }}" target="_blank" class="youtube"><i
                                class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
