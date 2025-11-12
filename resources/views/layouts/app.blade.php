<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Toko Perhiasan Cantik 💍</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(180deg, #fff7f0 0%, #f7e5dc 50%, #d9b8a3 100%);
      color: #4a1f1f; /* warna mahogany gelap */
      overflow-x: hidden;
      position: relative;
      min-height: 100vh;
    }

    h2 {
      font-weight: 700;
      color: #5b2a1a;
      letter-spacing: 1px;
    }

    .container {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      backdrop-filter: blur(10px);
    }

    /* Tombol gradasi */
    .btn-gradient {
      background: linear-gradient(90deg, #fff7cc, #f3e0b6, #8b4513);
      border: none;
      color: #4a1f1f;
      font-weight: 600;
      padding: 10px 20px;
      border-radius: 30px;
      transition: all 0.3s ease;
    }

    .btn-gradient:hover {
      transform: scale(1.05);
      background: linear-gradient(90deg, #ffe57a, #f3e0b6, #a0522d);
      color: #fff;
    }

    /* Efek gelembung hati */
    .heart {
      position: absolute;
      color: #a0522d;
      opacity: 0.5;
      animation: float 8s linear infinite;
      font-size: 18px;
    }

    @keyframes float {
      0% {
        transform: translateY(100vh) scale(0.8);
        opacity: 0;
      }
      30% {
        opacity: 0.6;
      }
      100% {
        transform: translateY(-10vh) scale(1.2);
        opacity: 0;
      }
    }

    /* Alert lembut */
    .alert {
      border-radius: 15px;
      background-color: #fff5e6;
      color: #5b2a1a;
      border: 1px solid #d9b8a3;
    }
  </style>
</head>
<body>

  <!-- Gelembung hati -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const hearts = ["💖","💝","💗","💓","💞"];
      for (let i = 0; i < 15; i++) {
        const heart = document.createElement("div");
        heart.classList.add("heart");
        heart.innerText = hearts[Math.floor(Math.random() * hearts.length)];
        heart.style.left = Math.random() * 100 + "vw";
        heart.style.animationDuration = 5 + Math.random() * 5 + "s";
        heart.style.fontSize = 12 + Math.random() * 20 + "px";
        document.body.appendChild(heart);
        setTimeout(() => heart.remove(), 10000);
      }
      setInterval(() => {
        const heart = document.createElement("div");
        heart.classList.add("heart");
        heart.innerText = hearts[Math.floor(Math.random() * hearts.length)];
        heart.style.left = Math.random() * 100 + "vw";
        heart.style.animationDuration = 5 + Math.random() * 5 + "s";
        heart.style.fontSize = 12 + Math.random() * 20 + "px";
        document.body.appendChild(heart);
        setTimeout(() => heart.remove(), 10000);
      }, 1200);
    });
  </script>

  <div class="container mt-5">
    <h2 class="text-center mb-4">CRUD Toko Perhiasan Cantik 💍</h2>

    @if(session('success'))
      <div id="alertMessage" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
      </div>

      <script>
        setTimeout(() => {
          const alertBox = document.getElementById('alertMessage');
          if (alertBox) {
            alertBox.classList.remove('show');
            alertBox.classList.add('fade');
            setTimeout(() => alertBox.remove(), 500);
          }
        }, 3000);
      </script>
    @endif

    @yield('content')

</body>
</html>
