<?php

class Flasher
{
    public static function setFlash($bootstrap, $pesan)
    {
        $_SESSION['flash'] = [
            'bootstrap' => $bootstrap,
            'pesan' => $pesan
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert  mb-4 alert-' . $_SESSION['flash']['bootstrap'] . ' alert-dismissible fade show" role="alert">
            ' . $_SESSION['flash']['pesan'] . '
          </div>';
            unset($_SESSION['flash']);
        }
    }
}
