<?php
#CONNECT TO DB
require 'database.php';
#GET URL
$hpDel = $_GET['hp'];
mysqli_query($con,"DELETE FROM hp WHERE noHp='$hpDel'");
#SHOW MESSAGE
echo "<script>alert('Ahli Berjaya Dihapuskan!');
window.location='senarai_ahli.php'</script>";
?>