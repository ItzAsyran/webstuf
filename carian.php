<?php include "header.php"; ?>
<html>
    <!-- PANGGIL MENU -->
    <div id="menu">
        <?php include "menu.php"; ?>
    </div>
    <br>
    <!-- PANGGIL ISI -->
    <div id="isi">
        <div id="printarea">
            <!-- BORANG CARIAN -->
            <form method="post">
                <label>Carian Nombor Kad Pengenalan:</label>
                <input type="text" name="carian" size="20%" minlength="12" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autofocus>
                <button type="submit" name="cari">CARI</button>
            </form>
            <?php
             #GET ID FROM URL
             if (isset($_POST['carian'])) {
                $jumpa= $_POST['carian'];
                #PAPAR HASIL CARIAN
                $query_hadir = mysqli_query($con, "SELECT * FROM hadir AS t1 INNER JOIN peserta AS t2 ON t1.nomKp=t2.nomKp INNER JOIN hp AS t3 ON t2.nomHp=t3.nomHp INNER JOIN aktiviti AS t4 ON t1.kod=t4.kod WHERE t1.nomKp = '$jumpa' ORDER BY t3.nama ASC");
                $papar = mysqli_fetch_array($query_hadir);
                $no = 1;
                if(mysqli_num_rows($query_hadir) > 0) {
                    ?>
                    <h2><u>LAPORAN KEHADIRAN</u></h2>
                    <?php
                    echo "AKTIVITI : ".$papar['keterangan'];
                    echo "<br>NAMA : ".$papar['nama'];
                    echo "<br>JANTINA : ".$papar['jantina'];
                    echo "<br>NOMBOR KP : ".$papar['nomKp'];
                    ?>
                    <!-- PAPAR JADUAL -->
                    <hr><br>
                    <table border="1">
                        <tr>
                            <th>BIL</th>
                            <th>TARIKH</th>
                            <th>MASA</th>
                        </tr>
                        <?php
                        foreach ($query_hadir as $hadir){
                            
                        }
                    </table>
                }
             }
            ?>
        </div>
    </div>
</html>