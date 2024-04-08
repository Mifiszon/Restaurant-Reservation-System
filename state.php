<?php
    include'autoryzacja.php';

    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)
    or die("Błąd połączenia z bazą: ".mysqli_connect_error());

    if(isset($_POST['email']))
    {
        $result=mysqli_query($conn, "SELECT * FROM projekt_rezerwacje WHERE email='".$_POST['email']."';");
        if(!$row_client=mysqli_fetch_array($result)) $row_client['numer_rezerwacji']=0;
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Sevillana&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Czarna Perła - O Nas </title>
        <script>
            function sprawdz() {
                var imie = document.getElementsByName("imie")[0].value;
                var email = document.getElementsByName("email")[0].value;


                if (imie === "" || email === "") {
                    alert("Wszystkie pola są wymagane. Proszę wypełnić je przed wysłaniem formularza.");
                    return false;
                }


                return true;
            }
        </script>
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
                border-bottom: 1px double #A38A00;
                margin: 0;
            }

            td {
                text-align: center;
                padding: 20px;
                color: white;
                border-bottom: 1px dashed #A38A00;
            }

            .search {
                color: white;
            }

            .formularz {
                border: 5px double #A38A00;
                border-radius: 5px;
                background-color: black;
                padding: 70px;
                width: 20%;
            }

            h4 {
                text-align: center;
                font-family: 'Alex Brush', cursive;
                font-size: 40px;
                color: #D9BA8C;
                margin-top: 12px;
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
                if(isset($_POST['email']))
                {
                    $result=mysqli_query($conn, "SELECT * FROM projekt_rezerwacje WHERE imie='".$_POST['imie']."' AND email='".$_POST['email']."';");
                    echo '<p class="tabela">Szukana Rezerwacja<p>';
                    echo '<table>';
                    echo '<tr><th>Numer</th><th>Imię</th><th>Data i Godzina</th><th>Liczba gości</th><th>Zmień Rezerwację</th><th>Rezygnacja</th>';
                        while ($row=mysqli_fetch_array($result))
                        {
                                echo '<tr>';
                                    echo '<td>'.$row['numer_rezerwacji'].'</td><td>'.$row['imie'].'</td><td>'.$row['data_godzina'].'</td><td>'.$row['liczba_gosci'].'</td>';
                                    echo '<td><a href="edytuj.php?numer_rezerwacji='.$row['numer_rezerwacji'].'"> 📝 </a> </td>';
                                    echo '<td><a href="reservation.php?potwierdz='.$row['numer_rezerwacji'].'"> ❌ </a> </td>';
                                echo '</tr>';
                        }

                    echo '</table>';
                }
            ?>
        </div>

        <br><br>

        <div class="formularz">
            <h4>Znajdź Rezerwację</h4>
            <form action="state.php" method="post" class="search" onsubmit="return sprawdz()">
                Imię: <input type="text" name="imie"><br>
                E-mail: <input type="text" name="email"><br><br>
                <input type="submit" value="Szukaj"> <br>
                <input type="reset" value="Wyczyść">
            </form>
        </div>

        <br><br>    

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