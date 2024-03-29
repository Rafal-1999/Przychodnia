<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Przychodnia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="przychodnia.css">
</head>

<body>
    <div id="baner">
        <h1>PRAKTYKA LEKARZA RODZINNEGO</h1>
    </div>
    <div id="panel_lewy">
        <h2>LISTA PACJENTÓW</h2>
        <?php
        $w=mysqli_connect("localhost","root","","przychodnia");
        if(!$w)
        {
            echo"Bład łączenia bazy danych";
        }
        $zapytanie=mysqli_query($w,"SELECT id,imie,nazwisko FROM pacjenci");
        while($row=mysqli_Fetch_array($zapytanie))
        {
            echo "<br>". $row[0]." ".$row[1]." ".$row[2];
        }
        mysqli_close($w);
        ?>
        <br>
        <br>
        <form action="pacjent.php" method="POST">
            Podaj id:
            <br>
            <input type="number" name="wartosc">
            <input type="submit" name="wyslij" value="Pokaż dane">
        </form>
        <br>
        Lekarze:
        <ul>
            <li>Pn-śr
                <ol>
                    <li>Anna Kwiatkowska</li>
                    <li>Jan Kowalewski</li>
                </ol>
            </li>
            <li>Czw-pt
                <ol>
                    <li>Krzysztof Nowak</li>
                </ol>
            </li>
        </ul>
    </div>
    <div id="panel_prawy">
        <h2>INFORMACJE SZCZEGÓŁOWE O PACJENCIE</h2>
        <form action="przychodnia_dodanie.php" method="post">
            Podaj imie:
            <input type="text" name="imie">
            <br>
            Podaj nazwisko:
            <input type="text" name="nazwisko">
            <br>
            Choroba:
            <input type="text" name="choroba">
            <br>
            Uczulenie:
            <input type="text" name="uczulenie">
            <br>
            <input type="submit" value="Dodaj pacjenta">
        </form>
    </div>
    <div id="stopka">
        <p>Utworzone przez: PESEL<br>
        <a href="kwerendy.txt" alt="kwerendy">Pobierz plik z kwerendami</a></p>
    </div>
</body>

</html>