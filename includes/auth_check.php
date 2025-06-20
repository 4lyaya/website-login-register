<?php
// Memulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum, redirect ke halaman login
    header("Location: ../login.php");
    exit();
}

// Include koneksi database
require_once __DIR__ . '/../config/database.php';