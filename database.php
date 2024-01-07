<?php
#SET TIME ZONE WAKTU
date_default_timezone_set("Asia/Kuala_Lumpur");
$tarikhKini=date("Y-m-d");
$masaKini=date("H:i:s");

#DATABASE
$host="localhost";
$user="root";

#NAMA DB
$db="hadir2";
$password="";

#SAMBUNGAN PANGKALAN DATA
$con = mysqli_connect($host,$user,$password,$db);

#MSG IF CONNECT FAIL
if (mysqli_connect_errno()){
    echo "Database tidak berhubung!: ".mysqli_connect_error();
}

#CHANGE FOR SISTEM SETTING
$namasys = "SLOW AND TIDAK CEKAP";
$namasys1 = "SISTEM ELAK KEHADIRAN SALAH";
$motto = "Hobi membawa manfaat kepada diri sendiri";
?>