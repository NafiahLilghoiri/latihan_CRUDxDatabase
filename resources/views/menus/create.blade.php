@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(180deg, #fff7f0 0%, #f7e5dc 50%, #d9b8a3 100%);
    font-family: 'Poppins', sans-serif;
  }

  .card {
    background: rgba(255, 255, 255, 0.85);
    border: none;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(90, 50, 30, 0.15);
    animation: fadeIn 0.8s ease;
  }

  .card-body {
    padding: 35px;
  }

  h4 {
    color: #5b2a1a;
    font-weight: 700;
    margin-bottom: 25px;
  }

  label {
    color: #5b2a1a;
    font-weight: 500;
  }

  input.form-control {
    border-radius: 12px;
    border: 1px solid #caa48b;
    padding: 10px 15px;
    background-color: #fffdfb;
    transition: all 0.2s ease;
  }

  input.form-control:focus {
    border-color: #8b4513;
    box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.2);
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

  .btn-back {
    background-color: #f3e0b6;
    border: none;
    color: #5b2a1a;
    border-radius: 30px;
    padding: 10px 25px;
    font-weight: 500;
    transition: all 0.3s;
  }

  .btn-back:hover {
    background-color: #d9b8a3;
    color: white;
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

<div class="card mt-4">
  <div class="card-body">
    <h4>✨ Tambah Perhiasan Baru 💍</h4>
    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label>Nama Perhiasan</label>
        <input type="text" name="nama_menu" class="form-control" value="{{ old('nama_menu') }}">
        @error('nama_menu') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="mb-3">
        <label>Harga (Rp)</label>
        <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">
        @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="mb-3">
        <label>Foto Perhiasan</label>
        <input type="file" name="foto" class="form-control">
        @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="mt-4">
        <button class="btn-gradient">💎 Simpan Perhiasan</button>
        <a href="{{ route('menus.index') }}" class="btn-back">Kembali</a>
      </div>
    </form>
  </div>
</div>
@endsection
