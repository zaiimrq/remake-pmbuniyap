<?php 


class Flasher
{
    public static function setFlash($status, $message, $style, $type)
    {
        $_SESSION['flash'][$type] = [
            "status" => $status,
            "message" => $message,
            "style" => $style
        ];
    }

    public static function flash($type)
    {
        if (isset($_SESSION['flash'][$type])) {
            echo '
                <div class="alert alert-'. $_SESSION['flash'][$type]['style'] .' alert-dismissible fade show" role="alert">
                    <strong>'. $_SESSION['flash'][$type]['status'] .'</strong> '. $_SESSION['flash'][$type]['message'] .'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';

            unset($_SESSION['flash'][$type]);
        }
    }

    public static function setSession($value) 
    {
        $_SESSION['auth'] = [
            'login' => $value
        ];
    }
}