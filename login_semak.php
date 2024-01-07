<?php
#CONNECT DATABASE
require 'database.php';
#START CONNECTION
session_start();
#DAPATKAN POST VALUES
if (isset($_POST['user'])) {
    #POST VALUE KE VARIABLE
    $user = mysqli_real_escape_string($con,$_POST['user']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    #OPEN SQL
    $query = mysqli_query($con, "
    SELECT * FROM peserta AS t1
    INNER JOIN hp AS t
    ON t1.nomHp=t2.nomHp
    WHERE t1.nomKp='$user' AND t1.password='$pass'");
    $row = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query) == 0 || $row['password']!=$pass)
    {
        #ERROR IF FAIL
        echo "<script>alert('Nom KP atau Password salah');
        window.location='index.php'</script>";
    }else{
        #CREATE SESSION
        $_SESSION['user']=$row['nomKp'];
        $_SESSION['nama']=$row['nama'];
        $_SESSION['level']=$row['aras'];
        #OPEN DASHBOARD
        header("Location: dashboard.php");
    }
}
?>