<?php
// =============================================
// login.php (Admin Only - Aman & Konsisten)
// =============================================

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Jika sudah login dan punya session admin
if (isset($_SESSION['status']) && $_SESSION['status'] === 'login' && isset($_SESSION['idadmin'])) {
    // Hanya role admin yang boleh lanjut
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        header("Location: index.php?halaman=dashboard");
        exit;
    } else {
        // Jika role tidak cocok, hapus session
        session_unset();
        session_destroy();
        header("Location: login.php?pesan=gagal_role");
        exit;
    }
}

// Tetapkan label dan pesan untuk halaman login
$username_label = 'Username';
$username_name  = 'username';
$login_message  = 'Masuk menggunakan akun Admin Sekolah';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Aplikasi Absensi Admin</title>
    
    <style>
        :root {
          --bg-primary: #0b1220; 
          --bg-secondary: #08101a; 
          --card-bg: rgba(15, 23, 42, 0.85);
          --accent: #00ffcc; 
          --text-color: #eaf6ff;
          --muted-color: #7f8ca3;
          --input-bg: rgba(255,255,255,0.05);
          --border-color: rgba(255,255,255,0.08);
          --error-bg: rgba(255, 70, 70, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: var(--card-bg);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 380px;
            border: 1px solid var(--border-color);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .logo h1 {
            color: var(--accent);
            font-size: 24px;
            margin-bottom: 5px;
        }

        .logo p.lead {
            color: var(--muted-color);
            font-size: 14px;
            margin-bottom: 20px;
        }

        .alert {
            background: var(--error-bg);
            color: #ff4646;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 70, 70, 0.3);
            font-size: 14px;
        }

        .input {
            margin-bottom: 20px;
        }

        .input label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: var(--muted-color);
        }

        .input input[type="text"],
        .input input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background: var(--input-bg);
            color: var(--text-color);
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .input input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 5px rgba(0, 255, 204, 0.5);
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: var(--accent);
            color: var(--bg-primary);
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn:hover {
            background-color: #00e0b3;
            box-shadow: 0 0 10px rgba(0, 255, 204, 0.6);
        }
    </style>
</head>
<body>
  <div class="card" role="main">

    <div class="logo">
      <h1>Login Aplikasi Absensi</h1>
      <p class="lead"><?php echo $login_message; ?></p>
    </div>

    <?php if(isset($_GET['pesan'])): ?>
      <?php 
        $error_message = '';
        if ($_GET['pesan'] == 'gagal') {
            $error_message = 'Login gagal! Periksa kembali Username dan Password Anda.';
        } elseif ($_GET['pesan'] == 'logout') {
            $error_message = 'Anda berhasil logout.';
        } elseif ($_GET['pesan'] == 'belum_login') {
            $error_message = 'Anda harus login untuk mengakses halaman ini.';
        } elseif ($_GET['pesan'] == 'gagal_role') {
            $error_message = 'Session tidak valid. Silakan login ulang.';
        }
      ?>
      <div class="alert"><?php echo htmlspecialchars($error_message); ?></div>
    <?php endif; ?>


    <form id="loginForm" method="post" action="auth_process.php" autocomplete="off" novalidate>
      
      <input type="hidden" name="role" value="admin"> 

      <div class="input">
        <label for="<?php echo $username_name; ?>"><?php echo $username_label; ?></label>
        <input id="<?php echo $username_name; ?>" name="<?php echo $username_name; ?>" type="text" required minlength="2" />
      </div>
      <div class="input">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required minlength="4" />
      </div>

      <button class="btn" type="submit">Masuk</button>
      
    </form>
  </div>

<script>
// Validasi client-side sederhana
document.getElementById('loginForm').addEventListener('submit', function(e){
    var usernameInput = document.getElementById('username');
    var passwordInput = document.getElementById('password');

    var u = usernameInput ? usernameInput.value.trim() : '';
    var p = passwordInput ? passwordInput.value.trim() : '';
    
    if(u.length < 2 || p.length < 4){
        e.preventDefault();
        alert('Mohon lengkapi Username minimal 2 karakter dan Password minimal 4 karakter.');
        return false;
    }
});
</script>
</body>
</html>
