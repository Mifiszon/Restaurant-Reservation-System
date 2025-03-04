<?php
    include'autoryzacja.php';

    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)
    or die("Błąd połączenia z bazą: ".mysqli_connect_error());
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Sevillana&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Czarna Perła - O Nas </title>
        <style>
            .main {
                width: 80%;
            }

            table {
                background-color: black;
                border: 3px double #A38A00;
                width: 100%;
                margin: 0;
                border-collapse: collapse;
            }

            th {
                color: #D9BA8C;
                padding:  8px;
                text-align: center;
                font-size: 25px;
                background-color: #28282B;
                border-bottom: 3px double #A38A00;
                margin: 0;
            }

            td {
                text-align: center;
                padding: 20px;
                color: white;
                border-bottom: 1px dashed #A38A00;
            }

            .tabela {
                text-align: center;
                font-size: 50px;
                font-family: 'Alex Brush', cursive;
            }

        </style>
    </head>
    <body>

        <header>
            <h1> Czarna Perła </h1>
            <h5> Exclusive Restaurant </h5>
        </header>

        <br><br>

        <nav>
            <a href="index.html" class="nav-tile">Strona Główna</a>
            <a href="index.html#menu" class="nav-tile">Menu</a>
            <a href="about.php" class="nav-tile">O Nas</a>
            <a href="sign.php" class="nav-tile">Stały Klient</a>
            <a href="reservation.php" class="nav-tile">Rezerwacja Online</a>
            <a href="state.php" class="nav-tile">Status Rezerwacji</a>
        </nav>

        <div class="main">
            <?php

                $result=mysqli_query($conn, "SELECT * FROM projekt_pracownicy WHERE stanowisko='manager';");
                echo '<p class="tabela">Manager<p>';
                echo '<table>';
                echo '<tr><th>Imię</th><th>Nazwisko</th><th>Specjalizacja</th>';
                    while ($row=mysqli_fetch_array($result))
                    {
                        echo '<tr>';
                            echo '<td>'.$row['imie'].'</td><td>'.$row['nazwisko'].'</td><td>'.$row['specjalizacja'].'</td>';
                        echo '</tr>';
                    }
                echo '</table>';

                echo '<br>';

                $result=mysqli_query($conn, "SELECT * FROM projekt_pracownicy WHERE stanowisko='kucharz' ORDER BY stawka DESC;");
                echo '<p class="tabela">Kuchnia<p>';
                echo '<table>';
                echo '<tr><th>Imię</th><th>Nazwisko</th><th>Specjalizacja</th>';
                    while ($row=mysqli_fetch_array($result))
                    {
                        echo '<tr>';
                            echo '<td>'.$row['imie'].'</td><td>'.$row['nazwisko'].'</td><td>'.$row['specjalizacja'].'</td>';
                        echo '</tr>';
                    }
                echo '</table>';

                echo '<br>';

                $result=mysqli_query($conn, "SELECT * FROM projekt_pracownicy WHERE stanowisko='kelner' ORDER BY stawka DESC    ;");
                echo '<p class="tabela">Obsługa Kelnerska<p>';
                echo '<table>';
                echo '<tr><th>Imię</th><th>Nazwisko</th><th>Specjalizacja</th>';
                    while ($row=mysqli_fetch_array($result))
                    {
                        echo '<tr>';
                            echo '<td>'.$row['imie'].'</td><td>'.$row['nazwisko'].'</td><td>'.$row['specjalizacja'].'</td>';
                        echo '</tr>';
                    }
                echo '</table>';

                echo '<br>';

            ?>
        </div>

        <footer>
            <div class="container">
                <div class="collumn">
                    <img src="logo.png" alt="logo" class="logo">
                </div>
                <div class="collumn">
                <h3>Kontakt</h3>
                    <p> 
                        Telefon: <a href="tel:+48600600600">+48 600 600 600</a> <br>
                        E-mail: <a href="mailto:czarna.perla@perla.pl">czarna.perla@perla.pl</a>
                    </p>
                </div>
                <div class="collumn">
                    <h3>Lokalizacja</h3>
                    <p>
                        Rynek Główny 36 <br> 
                        31-013 Kraków
                    </p>
                </div>
                <div class="collumn">
                    <h3>Godziny Otwarcia</h3>
                    <p>
                        Sobota - Niedziela 16.00 - 24.00 <br>
                        Kuchnia otwarta do 23.00
                    </p>
                </div>
            </div>
        </footer>

    </body>
</html>