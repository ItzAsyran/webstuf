<?php
#MULA SESI
session_start();
#SAMBUNG P.DATA
require 'database.php';
?>
<html>
    <!-- Link CSS, Nama Web -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://rsms.me/">
	<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title><?php echo $namasys;?></title>
    <div class="header">
        <br>
        <h1><?php echo $namasys1;?></h1>
        <h3><?php echo $motto;?></h3>
        <!-- ZOOM IN AND OUT BUTTON UTILITY -->
        <?php include 'utility.php'; ?>
    </div>
</html>