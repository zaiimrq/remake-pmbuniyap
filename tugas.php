<?php 

// echo $_SERVER['REQUEST_URI'];

// unlink('app/storage/122*.pdf');

$folder = 'app/storage/';
// $patern = 122*;
$file = glob($folder . $patern);

if ($file) {
    foreach ($file as $f) {
        if (is_file($f)) {
            unlink($f);
        }
    }
}