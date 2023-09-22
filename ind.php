<?php 

// $conn = mysqli_connect('localhost', 'root', '', 'db_pmbuniyap');

// $query = "INSERT INTO cama SET nisn=98765, nama='zaii', email='zai@gmail.com'";
// $quer = "INSERT INTO pendaftaran SET no_pendaftar=123, nisn=98765, password='zaii'";
// mysqli_query($conn, $query);
// mysqli_query($conn, $quer);


$dsn = "mysql:host=localhost;dbname=db_pmbuniyap";
$dbh = new PDO($dsn, 'root', '');

$stmt = $dbh->prepare("INSERT INTO cama SET nisn=321, nama='zaii', email='zaii@gmail.com'");
// $stmt = $dbh->prepare("INSERT INTO pendaftaran SET no_pendaftar=322, nisn=321, password='zaii'");
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $stmt = $dbh->prepare("INSERT INTO pendaftaran SET no_pendaftar=322, nisn=321, password='zaii'");
    $stmt->execute();  
}
// var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
