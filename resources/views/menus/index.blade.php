@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(180deg, #fff7f0 0%, #f7e5dc 50%, #d9b8a3 100%);
    font-family: 'Poppins', sans-serif;
  }

  h2 {
    color: #5b2a1a;
    font-weight: 700;
    margin-bottom: 25px;
  }

  /* Card container */
  .content-box {
    background: rgba(255, 255, 255, 0.85);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(90, 50, 30, 0.15);
    padding: 30px;
    animation: fadeIn 0.8s ease;
  }

  /* Tombol gradasi */
  .btn-gradient {
    background: linear-gradient(90deg, #fff7cc, #f3e0b6, #8b4513);
    border: none;
    color: #4a1f1f;
    font-weight: 600;
    padding: 10px 25px;
    border-radius: 30px;
    transition: all 0.3s ease;
  }

  .btn-gradient:hover {
    transform: scale(1.05);
    background: linear-gradient(90deg, #ffe57a, #f3e0b6, #a0522d);
    color: #fff;
  }

  /* Tombol aksi kecil */
  .btn-edit {
    background-color: #f7d794;
    border: none;
    color: #4a1f1f;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 8px;
    transition: all 0.3s;
  }

  .btn-edit:hover {
    background-color: #f5c46a;
    color: white;
  }

  .btn-delete {
    background-color: #d67a7a;
    border: none;
    color: white;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 8px;
    transition: all 0.3s;
  }

  .btn-delete:hover {
    background-color: #b94d4d;
  }

  /* Tabel */
  table {
    border-radius: 12px;
    overflow: hidden;
    background-color: rgba(255, 255, 255, 0.9);
  }

  thead {
    background-color: #5b2a1a !important;
    color: #fff;
  }

  tbody tr {
    vertical-align: middle;
    transition: background 0.3s;
  }

  tbody tr:hover {
    background-color: rgba(217, 184, 163, 0.25);
  }

  img {
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(90, 50, 30, 0.2);
  }

  /* Animasi muncul */
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* Gelembung hati */
  .heart {
    position: fixed;
    color: #a0522d;
    opacity: 0.5;
    animation: float 8s linear infinite;
    font-size: 18px;
    z-index: 0;
  }

  @keyframes float {
    0% { transform: translateY(100vh) scale(0.8); opacity: 0; }
    30% { opacity: 0.6; }
    100% { transform: translateY(-10vh) scale(1.2); opacity: 0; }
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const hearts = ["💖", "💝", "💗", "💓", "💞"];
    setInterval(() => {
      const heart = document.createElement("div");
      heart.classList.add("heart");
      heart.innerText = hearts[Math.floor(Math.random() * hearts.length)];
      heart.style.left = Math.random() * 100 + "vw";
      heart.style.animationDuration = 5 + Math.random() * 5 + "s";
      heart.style.fontSize = 12 + Math.random() * 20 + "px";
      document.body.appendChild(heart);
      setTimeout(() => heart.remove(), 10000);
    }, 1000);
  });
</script>

<div class="content-box mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>💎 Daftar Perhiasan Cantik</h2>
    <a href="{{ route('menus.create') }}" class="btn-gradient">+ Tambah Perhiasan</a>
  </div>

  <table class="table table-bordered table-striped text-center align-middle">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Perhiasan</th>
        <th>Foto</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($menus as $menu)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $menu->nama_menu }}</td>
        <td>
          @if($menu->foto)
            <img src="{{ asset('storage/'.$menu->foto) }}" width="80">
          @else
            <small class="text-muted">Tidak ada</small>
          @endif
        </td>
        <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
        <td>
          <a href="{{ route('menus.edit', $menu->id) }}" class="btn-edit">Edit</a>
          <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus perhiasan ini?')">
            @csrf
            @method('DELETE')
            <button class="btn-delete">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
