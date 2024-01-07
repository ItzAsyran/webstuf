<?php
#PAPARAN HEADER SISTEM
include 'header.php';
?>

<html>
    <!-- PAPAR MENU -->
    <div id="menu">
        <?php include 'menu.php'; ?>
    </div>
    <!-- PAPAR ISI -->
    <div id="isi">
        <h2>IMPORT AHLI</h2>
        <label>Pilih lokasi fail CSV:</label>
        <!-- FORM UPLOAD -->
        <form action="import_simpan.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" accept=".csv"/><br>
            <button type="submit" name="import">UPLOAD</button>
        </form>

        <u>CONTOH:</u><br><br>
        AFEEF,LELAKI,770628043355,0199287674<br>
        NUREEN,PEREMPUAN,821215043322,0179582594<br>
        <p>*Cipta fail dalam notepad++ dan SAVE AS senarai.csv</p>
    </div>
</html>