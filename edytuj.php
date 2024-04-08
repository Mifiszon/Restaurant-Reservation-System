<?php
    include'autoryzacja.php';

    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)
    or die("Błąd połączenia z bazą: ".mysqli_connect_error());

    if(isset($_GET['numer_rezerwacji']))
    {
        $result=mysqli_query($conn, "SELECT * FROM projekt_rezerwacje WHERE numer_rezerwacji='".$_GET['numer_rezerwacji']."';");
        $row=mysqli_fetch_array($result);
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Sevillana&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Czarna Perła - Zmiana Rezerwacji </title>
        <style>

            .zmiana {
                color: white;
            }
            
            .formularz {
                border: 5px double #A38A00;
                border-radius: 5px;
                background-color: black;
                padding: 40px;
            }

            h4 {
                text-align: center;
                font-family: 'Alex Brush', cursive;
                font-size: 40px;
                color: #D9BA8C;
                margin-top: 12px;
            }

        </style>
    </head>
    <body>

        <header>
            <h1> Czarna Perła </h1>
            <h5> Exclusive Restaurant </h5>
        </header>

        <br><br><br>

        <div class="formularz">
            <h4>Zmiana Rezerwacji</h4>
            <form action="reservation.php" method="post" class="zmiana">
                Imię: <input type="text" name="imie" value="<?php if(isset($row['imie'])) echo $row['imie'];?>"> <br>
                Data i godzina: <input type="text" name="data_godzina" value="<?php if(isset($row['data_godzina'])) echo $row['data_godzina'];?>"> <br>
                Liczba gości: <input type="text" name="liczba_gosci" value="<?php if(isset($row['liczba_gosci'])) echo $row['liczba_gosci'];?>"> <br>
                <input type="hidden" name="numer_rezerwacji" value="<?php if(isset($row['numer_rezerwacji'])) echo $row['numer_rezerwacji'];?>"> <br>
                <input type="submit" value="Zmień">
                <input type="reset" value="Zresetuj"> 
            </form>
        </div>

        <br><br><br>

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