<?php
    include("polaczenie.php");
    $zap1 = 'SELECT nazwa FROM obiekty WHERE idRodzaj = 10 AND panstwo = "Islandia";';
    $odp1 = mysqli_query($conn, $zap1);

    $zap2 = 'SELECT nazwa FROM obiekty WHERE idRodzaj = 14 AND panstwo = "Islandia";';
    $odp2 = mysqli_query($conn, $zap2);

    $zap3 = 'SELECT idObiekt, plik, nazwa FROM obiekty WHERE panstwo = "Islandia";';
    $odp3 = mysqli_query($conn, $zap3);



    
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Islandia</title>
</head>
<body>
    <header>
        <h1><a href="islandia.php">Zwiedzaj Islandię</a></h1>
    </header>
    <aside>
        <h3>Do zwiedzania</h3>
        <ul>
            <li>Wodospady:
                <?php
                    echo "<ol>";
                    while ($row = mysqli_fetch_row($odp2)) {
                        echo '<li>'.$row[0].'</li>';
                    }
                    echo "</ol>";
                ?>
            </li>
            <li>Siedliska zwierząt:
                <?php
                    echo "<ol>";
                    while ($row = mysqli_fetch_row($odp1)) {
                        echo '<li>'.$row[0].'</li>';
                    }
                    echo "</ol>";
                ?>
            </li>
        </ul>
    </aside>
    <main>
        <h3>Galeria</h3>
        <section>
            <?php
                while($row = mysqli_fetch_assoc($odp3)) {
                    echo '<a href="obiekty.php?idObiekt='.$row['idObiekt'].'"><img src="'.$row['plik'].'" alt="'.$row['nazwa'].'" title="'.$row['nazwa'].'" class="miniatury"></a>';
                }
            ?>
        </section>
    </main>
    <footer>
        <hr>
        <p>Autor: Jakub Wiła</p>
    </footer>
</body>
</html>