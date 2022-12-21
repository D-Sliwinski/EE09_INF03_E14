<?php
    if(isset($_POST["check"])){
        echo "Dodano rezerwację do bazy";
        $conn = mysqli_connect("localhost","root","","2021_06_01");
        $sql = "INSERT INTO rezerwacje (data_rez,liczba_osob,telefon) VALUES ('$_POST[data]',$_POST[osoby],'$_POST[numer]')";
        $query = mysqli_query($conn,$sql);
        mysqli_close($conn);
    }
?>