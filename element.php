<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


        if (!$array) {
            echo "No hay datos o hay un error en la decodificación del JSON.";
        } else {
            foreach ($array['elements'] as $elements) {
                if ($elements['name'] === $elementName) {
                    foreach ($elements as $key => $element) {
                        echo "$key: $element<br>";
                    }
                }
            }
        }
    }

    ?>
</body>

</html>