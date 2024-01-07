<?php include 'header.php'; ?>
<html>
    <!-- Panggil Menu -->
    <div id="isi">
        <h2>PENDAFTARAN AHLI BARU </h2>
        <body>
            <form method="POST" action="signup_simpan.php">
                <font color='red'>*Pastikan maklumat anda betul sebelum membuat pendaftaran.</font>
                <p>Nom Kad Pengenalan</p>
                <input type="text" name="nomKp" placeholder="Nombor KP tanpa tanda -" minlength="12" maxlength="12" size="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required autofocus><br>
                <font style="font-size:10px",color="red">*Password adalah 6 digir akhir nom Kp dijana secara automatik.</font></p>
                <p>Nama</p>
                <input type="text" name="nama" placeholder="Nama Anda" size="60" required></p>
                <p>Jantina</p>
                <select name="jantina">
                    <option value="">--PILIH--</option>
                    <option value="LELAKI">LELAKI</option>
                    <option value="PEREMPUAN">PEREMPUAN</option>
                </select>
                <p>Nom HP<br>
            <input type="text" name="nomHp" placeholder="Tanpa - " minlength="10" maxlength="14" size="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></p><br>
            <div>
                <button name="tantar" type="submit">DAFTAR</button>
                <button type="reset">RESET</button>
            </div>
            </form>
        </body>
    </div>
</html>