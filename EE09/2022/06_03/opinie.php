<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>Hurtownia spożywcza</h1>
    </header>
    <main>
        <h2>Opinie naszych klientów</h2>
        <?php
            $conn = mysqli_connect("localhost","root","","hurtownia");
            $sql = "SELECT DISTINCT zdjecie,imie,opinia FROM klienci,opinie,typy WHERE klienci.id=opinie.Klienci_id AND klienci.Typy_id IN (2,3)";
            $result = mysqli_query($conn, $sql);
            foreach($result as $row){
                echo "<section class=blok-opinii>";
                echo "<img src=$row[zdjecie] alt=zdjecie>";
                echo "<blockquote>$row[opinia]</blockquote>";
                echo "<h4>$row[imie]</h4>";
                echo "</section>";
            }
        ?>
    </main>
    <footer>
        <section id="stopka1">
            <h3>Współpracują z nami</h3>
            <a href="http://sklep.pl">Sklep 1</a>
        </section>
        <section id="stopka2">
            <h3>Nasi top klienci</h3>
            <ol>
                <?php
                    $sql = "SELECT imie,nazwisko,punkty FROM klienci ORDER BY punkty DESC LIMIT 3";
                    $result = mysqli_query($conn, $sql);
                    foreach($result as $row){
                    echo "<li>$row[imie] $row[nazwisko], $row[punkty] pkt.</li>";
                    }
                    mysqli_close($conn);
                ?>
            </ol>
            <cite></cite>
        </section>
        <section id="stopka3">
            <h3>Skontaktuj się</h3>
            <p>telefon: 111222333</p>
        </section>
        <section id="stopka4">
            <h3>Autor: Dominik Śliwiński</h3>
        </section>
    </footer>
</body>
</html>