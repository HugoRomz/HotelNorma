<?php
include('Fuction_Backup.php');

echo backup_tables('localhost','root','','hotel_norma');

$fecha=date("Y-m-d"."H-m-s");
header("Content-disposition: attachment; filename=db-backup-".$fecha.".sql");
header("Content-type: MIME");
readfile("db-backup-".$fecha.".sql");

?>

