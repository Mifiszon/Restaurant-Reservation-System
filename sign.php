<?php
    include'autoryzacja.php';

    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)
    or die("Błąd połączenia z bazą: ".mysqli_connect_error());

    $liczbaKlientow=0;


    if(isset($_POST['imie']))
    {
        mysqli_query($conn, "INSERT INTO projekt_klienci (imie, nazwisko, email, numer) 
        VALUES ('".$_POST['imie']."','".$_POST['nazwisko']."','".$_POST['email']."','".$_POST['numer']."');");

        $liczbaKlientow++;
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Sevillana&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Czarna Perła - Stały Klient </title>
        <script>
            function sprawdz() {
                var imie = document.getElementsByName("imie")[0].value;
                var email = document.getElementsByName("nazwisko")[0].value;
                var dataGodzina = document.getElementsByName("email")[0].value;
                var liczbaGosci = document.getElementsByName("numer")[0].value;

                if (imie === "" || nazwisko === "" || email === "" || numer === "") 
                {
                    alert("Wszystkie pola są wymagane. Proszę wypełnić je przed wysłaniem formularza.");
                    return false;
                }

                return true;
            }
        </script>
        <style>

            .maincont {
                display: flex;
                flex-direction: row; 
                justify-content: space-between;
                font-family: 'Times New Roman', Times, serif;
            }

            .add {
                color: white;
            }

            .formularz {
                border: 5px double #A38A00;
                border-radius: 5px;
                background-color: black;
                padding: 50px;
                margin-right: 100px;
            }

            .opis {
                width: 50%;
                background-color: black;
                border:5px double #A38A00;
                padding: 15px;
                text-align: center;
                height: 60%;
                margin-left: 50px;
                border-radius: 4px;
                font-size: 20px;
            }

            .lista {
                color: white;
                list-style-type: "\25C6";
            }

            .opis ul {
                list-style-position: inside;
                padding-left: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .opis li {
                text-align: left;
                width: 35%;
                margin-bottom: 10px;
                margin-left: 60px;
            }

            h4 {
                text-align: center;
                font-family: 'Alex Brush', cursive;
                font-size: 35px;
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

        <br><br>

        <nav>
            <a href="index.html" class="nav-tile">Strona Główna</a>
            <a href="index.html#menu" class="nav-tile">Menu</a>
            <a href="about.php" class="nav-tile">O Nas</a>
            <a href="sign.php" class="nav-tile">Stały Klient</a>
            <a href="reservation.php" class="nav-tile">Rezerwacja Online</a>
            <a href="state.php" class="nav-tile">Status Rezerwacji</a>
        </nav>

        <br><br>
        
        <div class="maincont">
            <div class="opis">
                <h3 style="font-size: 40px; font-family: 'Alex Brush', cursive;">Program Stałego Klienta</h3>
                <p class="sk">
                Witaj w programie stałego klienta naszej restauracji! 
                Zapisz się już dziś, aby cieszyć się ekskluzywnymi korzyściami 
                dostępnymi tylko dla naszych stałych gości.
                <br> <br>
                <h3>Dlaczego warto dołączyć?</h3>
                </p>
                <ul class="lista">
                    <li>Priorytetowe Rezerwacje</li>
                    <li>Wyjątkowe Oferty</li>
                    <li>Specjał Urodzinowy</li>
                </ul>
                <p style="margin-right: 50px; margin-top: 30px;">Liczba stałych klientów: <?php echo $liczbaKlientow; ?></p>
            </div>

            <br>
            <br>

            <div class="formularz">
                <h4>Dołącz do Grona Stałych Gości</h4>
                <form action="sign.php" method="post" class="add" onsubmit="return sprawdz()">
                    Imię: <input type="text" name="imie"><br>
                    Nazwisko: <input type="text" name="nazwisko"><br>
                    Adres E-mail: <input type="text" name="email"><br>
                    Numer Telefonu: <input type="text" name="numer"><br> <br>
                    <input type="submit" value="Zapisz Się"><br>
                    <input type="reset" value="Wyczyść">
                </form>
            </div>
        </div>

        <br>
        <br>
        <br>

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