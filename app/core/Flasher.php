<?php 


class Flasher
{
    public static function setFlash($status, $message, $style)
    {
        $_SESSION['flash'] = [
            "status" => $status,
            "message" => $message,
            "style" => $style
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
                <div class="alert alert-'. $_SESSION['flash']['style'] .' alert-dismissible fade show" role="alert">
                    <strong>'. $_SESSION['flash']['status'] .'</strong> '. $_SESSION['flash']['message'] .'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';

            unset($_SESSION['flash']);
        }
    }

    public static function setSession($value) 
    {
        $_SESSION['auth'] = [
            'login' => $value
        ];
    }
}