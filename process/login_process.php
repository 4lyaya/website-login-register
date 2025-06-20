<?php
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

// Tangkap data dari form
$email = trim($_POST['email']);
$password = $_POST['password'];

// Validasi input
if (empty($email) || empty($password)) {
    redirectWithMessage('/website-login-register/login.php', 'danger', 'Email dan password harus diisi!');
}

// Cari user di database
$stmt = $conn->prepare("SELECT id, nama, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    redirectWithMessage('/website-login-register/login.php', 'danger', 'Email tidak terdaftar!');
}

$user = $result->fetch_assoc();

// Verifikasi password
if (password_verify($password, $user['password'])) {
    // Set session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_nama'] = $user['nama'];
    $_SESSION['user_email'] = $email;

    // Redirect ke dashboard dengan path absolut
    redirectWithMessage('/website-login-register/dashboard.php', 'success', 'Login berhasil! Selamat datang ' . htmlspecialchars($user['nama']));
} else {
    redirectWithMessage('/website-login-register/login.php', 'danger', 'Password salah!');
}

$stmt->close();
$conn->close();
?>