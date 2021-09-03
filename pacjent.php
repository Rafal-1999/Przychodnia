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
		<?php
		$q=mysqli_connect("localhost","root","","przychodnia");
		if(!$q)
		{
			echo "Błąd łączenia bazy danych";
		}
		$idx=$_POST['wartosc'];
		$zapytanie= mysqli_query($q,"SELECT imie,nazwisko,choroba,uczulenie FROM pacjenci WHERE id=$idx");
		$row= mysqli_Fetch_array($zapytanie);
		echo "Imie i nazwisko: " . $row[0]. " ". $row[1];
		echo "<br>Choroba: ". $row[2];
		echo "<br>Uczulenie: ". $row[3];
		mysqli_close($q);
		?>
	</div>
	<div id="stopka">
		<p>Utworzone przez: PESEL<br>
		<a href="kwerendy.txt" alt="kwerendy">Pobierz plik z kwerendami</a></p>
	</div>
</body>

</html>