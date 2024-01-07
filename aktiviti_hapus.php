<?php
#SAMBUNG KE DB
require 'database.php';
#GET URL
$AktivitiDel = $_GET['id'];
mysqli_query($con,"DELETE FROM aktiviti WHERE kod='$AktivitiDel'");
#SHOW MESSAGE
echo "<script>alert('Aktiviti Berjaya Dihapuskan!');
window.location='aktiviti.php'</script>";
?>