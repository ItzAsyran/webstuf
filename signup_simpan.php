<?php
require 'database.php';

if (isset($_POST['hantar'])) {
    if ($_POST['jantina'] == NULL) {
        echo "<script>alert('Pilih Jantina'); window.location='signup.php'</script>";
    } else {
        // Receive POST values
        $Kp = $_POST['nomKp'];
        $LP = $_POST['jantina'];
        $Nama = $_POST['nama'];
        $Hp = $_POST['nomHp'];

        // Generate password (6 digits from the right of $Kp)
        $Pw = substr($Kp, -6);

        // Check if there are no records with the provided Hp and Kp
        $stmt1 = mysqli_prepare($con, "SELECT * FROM hp WHERE nomHp = ?");
        $stmt2 = mysqli_prepare($con, "SELECT * FROM peserta WHERE nomKp = ?");
        mysqli_stmt_bind_param($stmt1, "s", $Hp);
        mysqli_stmt_bind_param($stmt2, "s", $Kp);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_execute($stmt2);

        $detail1 = mysqli_stmt_num_rows($stmt1);
        $detail2 = mysqli_stmt_num_rows($stmt2);

        if ($detail1 == 0 && $detail2 == 0) {
            $insert_stmt = mysqli_prepare($con, "INSERT INTO peserta (nomKp, jantina, password, role, nomHp) VALUES (?, ?, ?, 'PENGGUNA', ?)");
            mysqli_stmt_bind_param($insert_stmt, "ssss", $Kp, $LP, $Pw, $Hp);
            
            if (mysqli_stmt_execute($insert_stmt)) {
                echo "<script>alert('Pendaftaran berjaya'); window.location='index.php'</script>";
            } else {
                echo "<script>alert('Pendaftaran gagal'); window.location='signup.php'</script>";
            }
        } else {
            echo "<script>alert('Pendaftaran gagal, Semak Nombor KP/HP'); window.location='signup.php'</script>";
        }

        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        mysqli_stmt_close($insert_stmt);
    }
}
?>
