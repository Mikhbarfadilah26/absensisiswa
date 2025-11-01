<?php
$hash = '$2y$10$LccatMaTtCmZ35L7U8kyq.Oiv3lUnmFqf/4xFp3bV8p...';
$password = 'admin123'; // ubah ini ke tebakanmu (admin, 12345, ikhbar123, dst)

if (password_verify($password, $hash)) {
    echo "✅ Cocok! Password yang benar adalah: $password";
} else {
    echo "❌ Tidak cocok untuk: $password";
}
?>