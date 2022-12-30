<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header id="baner1">
        <h2>Nasze osiedle</h2>
    </header>
    <header id="baner2">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "portal");
            $query = "SELECT COUNT(id) AS wiersze FROM dane";
            $result = mysqli_query($conn, $query);
            foreach($result as $row){
                echo "<h5>Liczba użytkowników portalu: $row[wiersze]";
            }
        ?>
    </header>
    <section id="lewy">
        <h3>Logowanie</h3>
        <form method="post">
            <label for="login">login</label><br>
            <input type="text" name="login"><br>
            <label for="haslo">hasło</label><br>
            <input type="password" name="haslo"><br>
            <input type="submit" name="submit" value="Zaloguj">
        </form>
    </section>
    <section id="prawy">
        <h3>Wizytówka</h3>
        <?php
            if($_POST['login']!=''&&$_POST['haslo']!=''){
                $query = "SELECT haslo FROM uzytkownicy WHERE `login`='$_POST[login]'";
                $result = mysqli_query($conn, $query);
                if(!mysqli_num_rows($result)>0){
                    echo "<span>Login nie istnieje</span>";
                }
                else{
                    foreach($result as $row){
                        if(sha1($_POST['haslo'])==$row['haslo']){
                            $query = "SELECT `login`,rok_urodz,przyjaciol,hobby,zdjecie FROM dane,uzytkownicy WHERE uzytkownicy.login='$_POST[login]' AND uzytkownicy.id=dane.id";
                            $result = mysqli_query($conn, $query);
                            foreach($result as $row){
                            echo "<section class=wizytowka>";
                            echo "<img src=$row[zdjecie] alt=osoba>";
                            $wiek = 2022 - $row['rok_urodz'];
                            echo "<h4>$row[login] ($wiek)</h4><br>";
                            echo "<p>hobby: $row[hobby]</p><br>";
                            echo "<h1><img src=icon-on.png> $row[przyjaciol]</h1><br>";
                            echo "<button onclick=location.href='dane.html'>Więcej informacji</button>";
                            echo "</section>";
                            }
                        }
                        else{
                            echo "<span>Haslo nieprawidłowe</span>";
                        }
                    }
                }
            }
        ?>
    </section>
    <footer>
        <span>Stronę wykonał: Dominik Śliwiński</span>
    </footer>
</body>
</html>