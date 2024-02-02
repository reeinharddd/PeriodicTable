<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="test.css">

</head>

<body>
    <header>

    </header>

    <?php
    if (isset($_GET['elemento'])) {
        $elementName = $_GET['elemento'];
        $url = 'https://raw.githubusercontent.com/Bowserinator/Periodic-Table-JSON/master/PeriodicTableJSON.json';

        $data = file_get_contents($url);
        $array = json_decode($data, true);

        echo "<div class='container'>";
        echo "<div class='grid'>";
        if (!$array) {
            echo "No hay datos o hay un error en la decodificación del JSON.";
        } else {
            foreach ($array['elements'] as $element) {
                if ($element['name'] === $elementName) {
                    echo '' . $elements['name'] . '';

                    echo "<div class='item-b'>
                       <p>
                        " . $element['category'] . "
                        </p>
                        </div>";
                    echo "<div class='item-b'></div>";
                    echo "<div class='item-c'></div>";

                    echo "<div class='item-d'></div>";

                    echo "<div class='item-d'></div>";

                    echo "<div class='item-e'></div>";

                    echo "<div class='item-f'></div>";

                    echo "<div class='item-g'></div>";

                    echo "<div class='item-h'></div>";

                    echo "<div class='item-i'></div>";
                    echo "<div class='item-j'></div>";
                }
            }
        }
        echo "</div>";
        echo "</div>";
    }

    ?>
</body>

</html>