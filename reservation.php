<?php
    include'autoryzacja.php';

    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)
    or die("Błąd połączenia z bazą: ".mysqli_connect_error());

    if(isset($_POST['numer_rezerwacji']))
    {
        mysqli_query($conn, "UPDATE projekt_rezerwacje SET numer_rezerwacji='".$_POST['numer_rezerwacji']."',imie='".$_POST['imie']."',data_godzina='".$_POST['data_godzina']."',liczba_gosci='".$_POST['liczba_gosci']."' WHERE numer_rezerwacji='".$_POST['numer_rezerwacji']."';");
    }

    else if(isset($_POST['imie']))
    {
        mysqli_query($conn, "INSERT INTO projekt_rezerwacje (imie, email, data_godzina, liczba_gosci, zaliczka) 
        VALUES ('".$_POST['imie']."','".$_POST['email']."','".$_POST['data_godzina']."','".$_POST['liczba_gosci']."','".$_POST['zaliczka']."');");
    }

    if(isset($_GET['usun']))    
    {
        mysqli_query($conn, "DELETE FROM projekt_rezerwacje WHERE numer_rezerwacji='".$_GET['usun']."';");
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Sevillana&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Czarna Perła - Rezerwacje </title>
        <script>
            function sprawdz() {
                var imie = document.getElementsByName("imie")[0].value;
                var email = document.getElementsByName("email")[0].value;
                var dataGodzina = document.getElementsByName("data_godzina")[0].value;
                var liczbaGosci = document.getElementsByName("liczba_gosci")[0].value;
                var zaliczka = document.getElementsByName("zaliczka")[0].value;

                if (imie === "" || email === "" || dataGodzina === "" || liczbaGosci === "" || zaliczka === "") {
                    alert("Wszystkie pola są wymagane. Proszę wypełnić je przed wysłaniem formularza.");
                    return false;
                }

                if (zaliczka === "" || isNaN(zaliczka) || parseFloat(zaliczka) < 500) {
                    alert("Minimalna kwotwa zaliczki to 500zł.");
                    return false; 
                }

                alert("Zaliczkę należy wpłacić w ciągu 24godzin na konto podane w mailu. W przeciwnym wypadku rezerwaja przepada. Zaliczka zostanie zwrócona po rezygnacji.");

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

            .add {
                color: white;
            }

            .formularz {
                border: 5px double #A38A00;
                border-radius: 5px;
                background-color: black;
                padding: 50px;
            }

            .tabela {
                text-align: center;
                font-size: 50px;
                font-family: 'Alex Brush', cursive;
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

        <br><br>

        <nav>
            <a href="index.html" class="nav-tile">Strona Główna</a>
            <a href="index.html#menu" class="nav-tile">Menu</a>
            <a href="about.php" class="nav-tile">O Nas</a>
            <a href="sign.php" class="nav-tile">Stały Klient</a>
            <a href="reservation.php" class="nav-tile">Rezerwacja Online</a>
            <a href="state.php" class="nav-tile">Status Rezerwacji</a>
        </nav>

        <br>

        <div class="main">
            <?php
                $result=mysqli_query($conn, "SELECT * FROM projekt_rezerwacje;");
                echo '<p class="tabela">Aktualne Rezerwacje<p>';
                echo '<table>';
                echo '<tr><th>Numer</th><th>Imię</th><th>Data i Godzina</th><th>Liczba gości</th>';

                if (isset($_GET['potwierdz'])) 
                {
                    echo '<th>Potwierdzenie</th>';
                }

                while ($row=mysqli_fetch_array($result))
                {
                    if((isset($_GET['potwierdz'])) && ($_GET['potwierdz']==$row['numer_rezerwacji']))
                        echo '<tr style="background-color: #A38A00">';
                    else
                        echo '<tr>';
                            echo '<td>'.$row['numer_rezerwacji'].'</td><td>'.$row['imie'].'</td><td>'.$row['data_godzina'].'</td><td>'.$row['liczba_gosci'].'</td>';

                            if((isset($_GET['potwierdz'])) && ($_GET['potwierdz']==$row['numer_rezerwacji']))
                                echo '<td><a href="reservation.php?usun='.$row['numer_rezerwacji'].'"> ✔️ </a> </td>';
                            else if (isset($_GET['potwierdz'])) 
                                echo '<td></td>';
                                
                        echo '</tr>';
                }
                echo '</table>';
                echo '<br>'
            ?>
        </div>

        <br><br>

        <div class="formularz">
            <h4>Zarezerwuj Stolik</h4>
            <form action="reservation.php" method="post" class="add" onsubmit="return sprawdz()">
                Imię: <input type="text" name="imie"><br>
                Adres E-mail: <input type="text" name="email"><br>
                Data i godzina: <input type="text" name="data_godzina"><br>
                Liczba gości: <input type="text" name="liczba_gosci"><br>
                Zaliczka: <input type="text" name="zaliczka"><br> <br>
                <input type="submit" value="Zarezerwuj"><br>
                <input type="reset" value="Wyczyść">
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