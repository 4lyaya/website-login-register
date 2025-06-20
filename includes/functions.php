<?php
// Fungsi untuk menampilkan pesan error/sukses
function displayMessage()
{
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $text = $_SESSION['message']['text'];

        echo "<div class='alert alert-$type alert-dismissible fade show' role='alert'>
                $text
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";

        // Hapus pesan setelah ditampilkan
        unset($_SESSION['message']);
    }
}

// Fungsi untuk redirect dengan pesan
function redirectWithMessage($url, $type, $text)
{
    $_SESSION['message'] = ['type' => $type, 'text' => $text];
    header("Location: $url");
    exit();
}
?>