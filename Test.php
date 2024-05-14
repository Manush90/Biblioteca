<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 100px;
            padding-top: 10px !important;
            background-color: lightsalmon;
            text-align: center;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            width: fit-content;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"],
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }


        input[name="presta_libro"],
        input[name="presta_dvd"] {
            background-color: #e74c3c;
            color: white;
        }


        input[name="restituisci_libro"],
        input[name="restituisci_dvd"] {
            background-color: #27ae60;
            color: white;
        }

        input[type="submit"]:hover {
            opacity: 0.8;
        }

        p {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <?php
    require_once 'Libro.php';
    require_once 'DVD.php';

    function mostraRisultati()
    {
        echo "<p>Libri totali: " . MaterialeBibliotecario::contaLibri() . "</p>";
        echo "<p>DVD totali: " . MaterialeBibliotecario::contaDVD() . "</p>";
    }


    $libriIniziali = new Libro(100);
    $dvdIniziali = new DVD(50);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $messaggioConferma = "";

        if (isset($_POST['presta_libro'])) {
            $quantitaLibri = isset($_POST['quantita_libri']) ? (int)$_POST['quantita_libri'] : 0;
            if ($quantitaLibri > 0) {
                for ($i = 0; $i < $quantitaLibri; $i++) {
                    $libriIniziali->presta();
                }
                $messaggioConferma = "Grazie per il prestito bello ! (LIBRO).";
            }
        } elseif (isset($_POST['restituisci_libro'])) {
            $libriIniziali->restituisci();
            $messaggioConferma = "Grazie per avermelo riportato bello !(LIBRO).";
        } elseif (isset($_POST['presta_dvd'])) {
            $quantitaDVD = isset($_POST['quantita_dvd']) ? (int)$_POST['quantita_dvd'] : 0;
            if ($quantitaDVD > 0) {
                for ($i = 0; $i < $quantitaDVD; $i++) {
                    $dvdIniziali->presta();
                }
                $messaggioConferma = "Grazie per il prestito bello ! (DVD).";
            }
        } elseif (isset($_POST['restituisci_dvd'])) {
            $dvdIniziali->restituisci();
            $messaggioConferma = "Grazie per avermelo riportato bello !(DVD).";
        }
    }

    ?>

    <h1>L'ennesima Biblioteca...</h1>

    <?php if (!empty($messaggioConferma)) : ?>
        <p><?php echo $messaggioConferma; ?></p>
    <?php endif; ?>

    <h1>Libri</h1>
    <p>Quantità disponibile: <?php echo MaterialeBibliotecario::contaLibri(); ?></p>
    <form method="post">
        <label for="quantita_libri">Quantità da prestare:</label>
        <input type="number" id="quantita_libri" name="quantita_libri" min="0" value="0">
        <input type="submit" name="presta_libro" value="Presta Libro">
        <input type="submit" name="restituisci_libro" value="Restituisci Libro">
    </form>

    <h1>DVD</h1>
    <p>Quantità disponibile: <?php echo MaterialeBibliotecario::contaDVD(); ?></p>
    <form method="post">
        <label for="quantita_dvd">Quantità da prestare:</label>
        <input type="number" id="quantita_dvd" name="quantita_dvd" min="0" value="0">
        <input type="submit" name="presta_dvd" value="Presta DVD">
        <input type="submit" name="restituisci_dvd" value="Restituisci DVD">
    </form>

    <?php mostraRisultati(); ?>
</body>

</html>