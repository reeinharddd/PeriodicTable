<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="test.css">

</head>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

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
                    echo "<div class='item-a item'>";
                    echo "1";
                    echo "<h1>" . $element['name'] . "</h1>";
                    echo "<model-viewer src='".$element['bohr_model_3d']."' ar ar-modes='webxr scene-viewer quick-look' camera-controls tone-mapping='commerce' poster='poster.webp' shadow-intensity='2' autoplay> </model-viewer> ";
                    echo "</div>";

                    echo "<div class='item-b item'>
                    2
                    </div>";

                    echo "<div class='item-c item'>
                    3
                    </div>";

                    echo "<div class='item-d item'>
                    4
                    </div>";

                    echo "<div class='item-d item'>
                    5
                    </div>";

                    echo "<div class='item-e item'>
                    6
                    </div>";

                    echo "<div class='item-f item'>
                    7
                    </div>";

                    echo "<div class='item-g item'>
                    8
                    </div>";

                    echo "<div class='item-h item'>
                    9
                    </div>";

                    echo "<div class='item-i item'>
                    10
                    </div>";
                    echo "<div class='item-j nt3'>
                    11 (No tan necesario)
                    </div>";
                }
            }
        }
        echo "</div>";
        echo "</div>";
    }

    ?>

    </div>
</body>

</html>