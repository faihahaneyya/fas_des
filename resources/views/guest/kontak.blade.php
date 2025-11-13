@extends('layouts.app')
@section('content')
    <section class="kontak">
        <h1>Hubungi Kami</h1>
        <p>Tim Sistem Desa siap membantu Anda untuk segala kebutuhan dan pertanyaan.</p>

        <div class="contact-cards">
            <div class="card">
                <h3>📞 Telepon</h3>
                <p>Hubungi kami langsung untuk informasi cepat.</p>
                <a href="tel:+621234567890">+62 123 456 7890</a>
            </div>

            <div class="card">
                <h3>✉ Email</h3>
                <p>Kirim pesan detail via email.</p>
                <a href="mailto:sistemdesa@gmail.com">sistemdesa@gmail.com</a>
            </div>

            <div class="card">
                <h3>📍 Alamat</h3>
                <p>Kunjungi kantor kami di Balai Desa.</p>
                <a href="https://maps.google.com" target="_blank">Lihat Peta</a>
            </div>
        </div>
    </section>
@endsection
