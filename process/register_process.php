<?php
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

// Tangkap data dari form
$nama = trim($_POST['nama']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validasi input
$errors = [];

if (empty($nama)) {
    $errors[] = 'Nama lengkap harus diisi!';
}

if (empty($email)) {
    $errors[] = 'Email harus diisi!';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid!';
}

if (empty($password)) {
    $errors[] = 'Password harus diisi!';
} elseif (strlen($password) < 6) {
    $errors[] = 'Password minimal 6 karakter!';
}

if ($password !== $confirm_password) {
    $errors[] = 'Password dan konfirmasi password tidak sama!';
}

// Jika ada error, tampilkan semua
if (!empty($errors)) {
    $errorMessage = implode('<br>', $errors);
    $_SESSION['old_input'] = [
        'nama' => $nama,
        'email' => $email
    ];
    header("Location: /website-login-register/register.php?error=" . urlencode($errorMessage));
    exit();
}

// Cek apakah email sudah terdaftar
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['old_input'] = [
        'nama' => $nama,
        'email' => $email
    ];
    header("Location: /website-login-register/register.php?error=Email sudah terdaftar!");
    exit();
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO users (nama, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nama, $email, $hashed_password);

if ($stmt->execute()) {
    // Set session untuk auto login setelah register
    $_SESSION['user_id'] = $stmt->insert_id;
    $_SESSION['user_nama'] = $nama;
    $_SESSION['user_email'] = $email;

    header("Location: /website-login-register/index.php?success=Pendaftaran berhasil! Selamat datang " . urlencode($nama));
    exit();
} else {
    $_SESSION['old_input'] = [
        'nama' => $nama,
        'email' => $email
    ];
    header("Location: /website-login-register/register.php?error=Terjadi kesalahan. Silakan coba lagi.");
    exit();
}

$stmt->close();
$conn->close();
?>