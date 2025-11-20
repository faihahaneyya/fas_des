@extends('layouts.app')

@section('content')

<!-- Tambahkan link Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<section class="tentang-sistem">
    <h2><i class="fa-solid fa-building-columns"></i> Tentang Sistem Peminjaman Ruangan Desa</h2>
    <p>
        <strong>Sistem Desa</strong> adalah platform digital terpadu yang dirancang untuk membantu masyarakat
        dan perangkat desa dalam mengelola, memantau, serta meminjam fasilitas desa dengan mudah, efisien, dan
        transparan.
    </p>

    <div class="overview">
        <h3><i class="fa-solid fa-seedling"></i> Tujuan Kami</h3>
        <p>
            Mewujudkan tata kelola desa yang modern dan berkeadilan melalui sistem digital.
            Kami berkomitmen untuk mempermudah warga dalam mengakses dan memanfaatkan fasilitas desa
            serta membantu perangkat desa dalam pemantauan kegiatan dan peminjaman.
        </p>
    </div>

    <div class="overview">
        <h3><i class="fa-solid fa-lightbulb"></i> Manfaat Sistem</h3>
        <p>
            <i class="fa-solid fa-check-circle"></i> Proses peminjaman lebih cepat dan praktis <br>
            <i class="fa-solid fa-check-circle"></i> Meningkatkan transparansi pengelolaan fasilitas <br>
            <i class="fa-solid fa-check-circle"></i> Mendorong partisipasi masyarakat dalam kegiatan desa <br>
            <i class="fa-solid fa-check-circle"></i> Memperkuat komunikasi antara warga dan pemerintah desa
        </p>
    </div>

    <div class="overview">
        <h3><i class="fa-solid fa-handshake"></i> Visi Kami</h3>
        <p>
            Menjadikan teknologi digital sebagai sarana penggerak pembangunan desa yang inklusif,
            berdaya saing, dan berkelanjutan.
        </p>
    </div>
</section>

@endsection

