<?php include 'header.php'; ?>
<!-- Start HTML -->
<html>
    <!-- Panggil Menu -->
    <div id="menu">
        <?php include 'menu.php'; ?>
    </div>
    <!-- PAPAR ISI -->
    <div id="isi">
        <!-- Display welcome -->
        <h3>SELAMAT DATANG </h3>
        echo strtoupper ($_SESSION['nama']);
        echo "<h3>TARIKH:"</h3>.$tarikhKini;
        echo "<br>MASA:".$masaKini; ?><hr>
        <!-- SHOW PAGE -->
        <?php if($_SESSION['level']=="PENGGUNA") {
            include 'hadir.php';
        }
        ?>
    </div>
</html>