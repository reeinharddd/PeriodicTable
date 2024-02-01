<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- <script type = "module" src = "https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
<model-viewer src="https://storage.googleapis.com/search-ar-edu/periodic-table/element_009_fluorine/element_009_fluorine.glb" ar ar-modes="webxr scene-viewer quick-look" camera-controls tone-mapping="commerce" poster="poster.webp" shadow-intensity="1" autoplay> </model-viewer>     -->
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
    echo "<div class ='periodic'>";

    $rows = 7;
    $cols = 18; 

    for ($row = 1; $row <= $rows; $row++) {
        echo "<div class='periodic-row'>";

        for ($col = 1; $col <= $cols; $col++) {
            $index = ($row - 1) * $cols + $col - 1;

            if (isset($array['elements'][$index])) {
                $element = $array['elements'][$index];

                echo "<div class='cell'>";
                echo "<a href='element.php?elemento=" . $element['name'] . "'>";
                echo "<div class='element'>";
                echo "<div class='at_num'>" . $element['number'] . "</div>";
                echo "<div class='symbol'>" . $element['symbol'] . "</div>";
                echo "<div class='at_details'>" . $element['name'] . "<br />" . $element['atomic_mass'] . "</div>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
            } else {
                echo "<div class='cell'></div>";
            }
        }

        echo "</div>";
    }

    echo "</div>";
}
?>

</body>

</html>


<!-- // if (is_array($value)) {
            //     foreach ($value as $key2 => $value2) {
            //         if (is_array($value2)) {
            //             foreach ($value2 as $key3 => $value3) {
            //                 echo "$key3: $value3";
            //                 echo "<br>";

            //             }
            //         } else {
            //             echo "$key2: $value2";
            //                 echo "<br>";

            //         }
            //     }
            // } else {
            //    echo "$key: $value";
            //                 echo "<br>";

            // } -->