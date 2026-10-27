<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "samochody";
    $conn = mysqli_connect($host, $user, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $zapytanie1 = "SELECT p.marka, p.model, p.cena, k.nazwa, k.doplata 
                    FROM pojazdy p 
                    JOIN kolory k ON k.id = p.kolor 
                    WHERE p.model LIKE 'alfa';
                    ";
    $odp1 = mysqli_query($conn, $zapytanie1);

    $zapytanie2 = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2;";
    $odp2 = mysqli_query($conn, $zapytanie2);
    $auto1 = mysqli_fetch_row($odp2); // Pobiera pierwszy wiersz z losowania
    $auto2 = mysqli_fetch_row($odp2); // Pobiera drugi wiersz z losowania

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Konfigurator samochodów</title>
</head>
<body>
    <header>
        <h1>Serwis konfiguracji samochodów</h1>
    </header>
    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurator</h2>
        <h2>Kontakt</h2>
    </nav>
    <main>
        <section class="left">
            <table>
                <?php
                    while($row = mysqli_fetch_row($odp1)) {

                        $suma = $row[2] + $row[4];

                        echo "
                            <tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[3]</td>
                                <td>$suma</td>
                            </tr>
                            ";
                    };
                ?>
            </table>
        </section>
        <section class="middle">
            <table>
                <tr1>
                    <th colspan="2">konfiguracja</th>
                    <th>Cena</th>
                </tr>
                <tr2>
                    <td colspan="3"><img src="a1.jpg" alt="Konfiguracja 1"></td>
                </tr>
                <tr3>
                    <td>Marka</td>
                    <td><?php echo $auto1[0]?></td>
                    <td rowspan="2"><?php echo $auto1[2]?></td>
                </tr>
                <tr4>
                    <td>model</td>
                    <td><?php echo $auto1[1]?></td>
                </tr>
                <tr5>
                    <td colspan="3"><img src="a2.jpg" alt="Konfiguracja 2"></td>
                </tr>
                <tr6>
                    <td>marka</td>
                    <td><?php echo $auto2[0]?></td>
                    <td rowspan="2"><?php echo $auto2[2]?></td>
                </tr>
                <tr7>
                    <td>model</td>
                    <td><?php echo $auto2[1]?></td>
                </tr>
            </table>
        </section>
        <section class="right">
            <h3>111 222 444</h3>
            <img src="a3.png" alt="Samochód">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Jakub Wiła</p>
    </footer>

    <?php
        mysqli_close($conn);
    ?>
</body>
</html>