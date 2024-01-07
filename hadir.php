<?php
require 'database.php';
session_start();

// Retrieve user session data
if (isset($_SESSION['user'])) {
    $KP = $_SESSION['user'];
} else {
    // Handle the case when the user is not logged in
    header("Location: login.php");
    exit();
}

if (isset($_POST['hadir'])) {
    $NOMKP = $_POST['nomkp'];
    $IDAC = $_POST['kod'];
    
    // Insert attendance record into the database
    $insertQuery = "INSERT INTO hadir (nomKp, masa, tarikh, kod) VALUES ('$NOMKP', NOW(), NOW(), '$IDAC')";
    
    if (mysqli_query($con, $insertQuery)) {
        echo "<script>alert('Kehadiran Telah Direkodkan');</script>";
    } else {
        echo "<script>alert('Kehadiran tidak berjaya');</script>";
    }
}

$query = mysqli_query($con, "SELECT * FROM aktiviti WHERE tarikhAktiviti >= CURDATE()");

while ($senarai = mysqli_fetch_array($query)) {
    echo strtoupper("<u>NOTIS PERINGATAN</u><br>" . $senarai['keterangan'] . "<br>tarikh:" . $senarai['tarikhAktiviti']) . "<hr>";

    $date1 = new DateTime();
    $date2 = new DateTime($senarai['tarikhAktiviti']);
    $diff = $date1->diff($date2)->days;

    if ($diff === 0) {
        $semak2 = mysqli_query($con, "SELECT * FROM hadir WHERE nomKp='$KP' AND tarikh=CURDATE()");

        if (mysqli_num_rows($semak2) === 0) {
?>
            <!-- Display "HADIR" button -->
            <form method="post">
                <h3>*Klik butang hadir untuk hadir aktiviti ini</h3>
                <input type="text" name="nomkp" value="<?php echo $KP; ?>" hidden>
                <input type="text" name="kod" value="<?php echo $senarai['kod']; ?>" hidden>
                <button name="hadir" type="submit">HADIR</button>
                <hr>
            </form>
<?php
        } else {
            echo "<h3>Anda telah mendaftar diri hadir</h3>";
        }
    } else {
        echo "Tiada aktiviti pada hari ini";
    }
}

// Display attendance log
$data1 = mysqli_query($con, "SELECT * FROM hadir AS t1 INNER JOIN aktiviti AS t2 ON t1.kod = t2.kod WHERE t1.nomKp='$KP' ORDER BY t1.tarikh DESC");
$no = 1;
?>

<!-- HTML -->
<html>
<div id="printarea">
    <h2><u>LOG KEHADIRAN</u></h2>
    <table border="1">
        <tr>
            <th>BIL</th>
            <th>KETERANGAN AKTIVITI</th>
            <th>TARIKH</th>
            <th>MASA</th>
        </tr>
        <?php while ($info1 = mysqli_fetch_array($data1)) { ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $info1['keterangan']; ?></td>
                <td><?php echo $info1['tarikh']; ?></td>
                <td><?php echo $info1['masa']; ?></td>
            </tr>
            <?php $no++; ?>
        <?php } ?>
        <tr>
            <td colspan="4" align="center">
                <font style="font-size:10px">* Senarai Tamat *</br>Jumlah Aktiviti: <?php echo $no - 1; ?></font>
                <p><button onclick="javascript:window.print()">CETAK</button></p>
            </td>
        </tr>
    </table>
</div>
</html>
