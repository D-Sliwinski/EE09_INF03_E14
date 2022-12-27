<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Forum miłośników psów</h1>
    </header>
    <section id="lewy">
        <img src="Avatar.png" alt="Użytkownik forum">
        <?php
            $conn = mysqli_connect("localhost","root","","forumpsy");
            $sql = "SELECT nick, postow, pytanie FROM konta, pytania WHERE konta.id=pytania.konta_id AND pytania.id=1";
            $result = mysqli_query($conn, $sql);
            foreach($result as $row){
                echo "<h4>Użytkownik: $row[nick]</h4>";
                echo "<p>$row[postow] postów na forum</p>";
                echo "<p>$row[pytanie]</p>";
            }
        ?>
        <video src="video.mp4" controls loop></video>
    </section>
    <section id="prawy">
        <form method="post">
            <textarea name="pole" cols="40" rows="4"></textarea><br>
            <input type="submit" value="Dodaj odpowiedź">
                <?php
                    if($_POST["pole"]!=""){
                        $sql = "INSERT INTO odpowiedzi (id,pytania_id,konta_id,odpowiedz) VALUES (NULL,1,5,'$_POST[pole]')";
                        $result = mysqli_query($conn, $sql);
                    }
                ?>
            <h2>Odpowiedzi na pytanie</h2>
            <ol>
                <?php
                    $sql = "SELECT odpowiedzi.id,odpowiedz,nick FROM konta,odpowiedzi WHERE odpowiedzi.konta_id=konta.id AND odpowiedzi.Pytania_id=1";
                    $result = mysqli_query($conn, $sql);
                    foreach($result as $row){
                        echo "<li>$row[odpowiedz] <i><b>$row[nick]</b></i> <hr></li>";
                    }
                ?>
            </ol>
        </form>
    </section>
    <footer>
        <span>Autor: Dominik Śliwiński</span>
        <a href="http://mojestrony.pl" target="_blank">Zobacz nasze realizacje</a>
    </footer>
</body>
</html>