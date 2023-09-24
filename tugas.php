<?php 

$dsn = "mysql:host=localhost;dbname=db_pmbuniyap";
$dbh = new PDO($dsn, 'root', '');

$stm = $dbh->prepare("SELECT * FROM cama WHERE nisn='22641003' AND (no_hp IS NULL OR kode_prodi IS NULL OR thn_lulus IS NULL OR jalur_masuk IS NULL OR asal_sekolah IS NULL");
$stm->execute();
var_dump($stm->rowCount());