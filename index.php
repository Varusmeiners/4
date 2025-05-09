<?php
$mysqli = new mysqli("localhost", "root", "", "restauracja");
$komunikat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stolik = $_POST['stolik'];
    $data = $_POST['data'];
    $liczba_osob = $_POST['liczba_osob'];
    $telefon = $_POST['telefon'];

    $stmt = $mysqli->prepare("INSERT INTO rezerwacje (stolik, data, liczba_osob, telefon) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $stolik, $data, $liczba_osob, $telefon);

    if ($stmt->execute()) {
        $komunikat = "✅ Rezerwacja została dodana pomyślnie.";
    } else {
        $komunikat = "❌ Błąd: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Restauracja Wszystkie Smaki</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Witamy w restauracji "Wszystkie Smaki"</h1>
    </header>

    <main>
        <section class="formularz">
            <h2>Zarezerwuj stolik</h2>
            <?php if ($komunikat): ?>
                <p class="info"><?= $komunikat ?></p>
            <?php endif; ?>
            <form method="post" action="">
                <label>Stolik: <input type="number" name="stolik" required></label><br>
                <label>Data: <input type="date" name="data" required></label><br>
                <label>Liczba osób: <input type="number" name="liczba_osob" required></label><br>
                <label>Telefon: <input type="tel" name="telefon" required></label><br>
                <input type="submit" value="Zarezerwuj">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2021 Restauracja Wszystkie Smaki</p>
    </footer>
</body>
</html>
