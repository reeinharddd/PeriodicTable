<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $url = 'https://raw.githubusercontent.com/Bowserinator/Periodic-Table-JSON/master/PeriodicTableJSON.json';

    $data = file_get_contents($url);
    $array = json_decode($data, true);

    if (!$array) {
        echo "No hay datos o hay un error en la decodificación del JSON.";
    } else {
        foreach ($array['elements'] as $key => $value) {
                    echo "<a href='elementoInfo.php?elemento=".$value['name']."'>";

            if (is_array($value)) {
                foreach ($value as $key2 => $value2) {
                    if (is_array($value2)) {
                        foreach ($value2 as $key3 => $value3) {
                            echo $key3;
                            echo "<br>";

                            echo $value3;
                            echo "<br>";

                        }
                    } else {
                        echo $key2;
                        echo "<br>";

                        echo $value2;
                        echo "<br>";

                    }
                }
            } else {
                echo $key;
                echo "<br>";
                echo $value;
                echo "<br>";

            }

                    echo "<hr>";

        }
        echo "</a>";
    }
    ?>
</body>

</html>