<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<main>
    <?php
    $url = 'https://raw.githubusercontent.com/Bowserinator/Periodic-Table-JSON/master/PeriodicTableJSON.json';

    $data = file_get_contents($url);
    $array = json_decode($data, true);
    if (!$array) {
        echo "No hay datos o hay un error en la decodificación del JSON.";
    } else {
        echo "<div class ='periodic'>";
        foreach ($array['elements'] as $element) {
            echo "<a class='cell' href='element.php?elemento=" . $element['name'] . "''>";
            $category = str_replace(' ', '_', $element["category"]);
            echo "<div class='element " . $category . "'>";
            echo "<div class='at_num'>" . $element['number'] . "</div>";
            echo "<div class='symbol " . $element['phase'] . "'>" . $element['symbol'] . "</div>";
            echo "<div class='at_details'>" . $element['name'] . "<br />" . $element['atomic_mass'] . "</div>";
            echo "</div>";

            echo "</a>";
        }

        echo "</div>";
    }
    ?>
</main>
</body>

</html>