<?php
    if(isset($_POST["submit"])){
        $conn = mysqli_connect("localhost","root","","2022_06_03");
        $sql = "INSERT INTO zawody_wedkarskie (`Karty_wedkarskie_id`,`Lowisko_id`,`data_zawodow`,`sedzia`) VALUES (0,$_POST[lowisko],$_POST[data],'$_POST[sedzia]')";
        $query = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
?>