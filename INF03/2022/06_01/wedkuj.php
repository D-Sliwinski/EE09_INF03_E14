<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <section id="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
            <?php
                $conn = mysqli_connect("localhost","root","","2022_06_01");
                $sql = "SELECT ryby.nazwa,lowisko.akwen,lowisko.wojewodztwo FROM lowisko,ryby WHERE ryby.id=lowisko.ryby_id AND lowisko.rodzaj=3";
                $query = mysqli_query($conn,$sql);
                foreach($query as $row){
                    echo "<li>$row[nazwa] pływa w rzece $row[akwen], $row[wojewodztwo]</li>";
                }
                mysqli_close($conn);
            ?>
        </ol>
    </section>
    <section id="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr><th>L.p.</th><th>Gatunek</th><th>Występowanie</th></tr>
            <?php
                $conn = mysqli_connect("localhost","root","","2022_06_01");
                $sql = "SELECT id,nazwa,wystepowanie FROM ryby WHERE styl_zycia=1";
                $query = mysqli_query($conn,$sql);
                foreach($query as $row){
                    echo "<tr><td>$row[id]</td><td>$row[nazwa]</td><td>$row[wystepowanie]</td></tr>";
                }
                mysqli_close($conn);
            ?>
        </table>
    </section>
    <section id="prawy">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <footer>
        <p>Stronę wykonał: Dominik Śliwiński</p>
    </footer>
</body>
</html>