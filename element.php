<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $elementName ?></title>
    <link rel="stylesheet" href="element.css">

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

                    // Basic information of the element
                    echo "<div class='item-b item'>";
                    echo "<h1 id='title'>Basic information</h1>";;
                    echo "<p><strong>Name::</strong> " . $element['name'] . "</p>";
                    echo "<p><strong>Atomic Number:</strong> " . $element['number'] . "</p>";
                    echo "<p><strong>Atomic Mass:</strong> " . $element['atomic_mass'] . "</p>";
                    echo "<p><strong>Appearance:</strong> " . $element['appearance'] . "</p>";
                    echo "<p><strong>Category:</strong> " . $element['category'] . "</p>";
                    echo "<p><strong>Period:</strong> " . $element['period'] . "</p>";
                    echo "<p><strong>Group:</strong> " . $element['xpos'] . "</p>";
                    echo "</div>";

                    // Phase of the element
                    echo "<div class='item-c item'?";
                    echo "3";
                    echo "<p><strong>Phase:</strong> " . $element['summary'] . "</p>";
                    echo "</div>";

                    // Chemical properties of the element
                    echo "<div class='item-d item'>";
                    echo "4";
                    echo "<h1 id='title'>Physical</h1>";
                    echo "<p><strong>Apparience:</strong> " . $element['appearance'] . "</p>";
                    echo "<p><strong>Density:</strong> " . $element['density'] . "</p>";
                    echo "<p><strong>Phase:</strong> " . $element['phase'] . "</p>";
                    echo "<p><strong>Boiling Poin:</strong> " . $element['boil'] . "</p>";
                    echo "<p><strong>Melting Point:</strong> " . $element['melt'] . "</p>";
                    echo "<p><strong>Electron Affinity:</strong> " . $element['electron_affinity'] . "</p>";
                    echo "<p><strong>Ionization Energy:</strong> " . $element['molar_heat'] . "</p>";
                    echo "</div>";  

                    echo "<div class='item-e item'>";
                    echo "5";
                    echo "<h1 id='title'>Chemical</h1>";
                    echo "<p><strong>Atomic Mass:</strong> " . $element['atomic_mass'] . "</p>";
                    echo "<p><strong>Electron Configuration:</strong> " . $element['electron_configuration'] . "</p>";
                    echo "<p><strong>Semantic Electron:</strong> " . $element['electron_configuration_semantic'] . "</p>";
                    echo "<p><strong>Electron Affinity:</strong> " . $element['electron_affinity'] . "</p>";
                    echo "<p><strong>Electronegativity:</strong> " . $element['electronegativity_pauling'] . "</p>";
                    echo "<p><strong>Ionization Energy:</strong> ";
                    foreach ($element['ionization_energies'] as $energy) {
                        echo $energy . ", ";
                    }
                    echo "</p>";
                    echo "</div>"; // End of the grid

                    echo "<div class='item-f item'>";
                    echo "6";
                    echo "<h1 id='title'>Discovery and Named</h1>";
                    echo "<p><strong>Discovered by:</strong> " . $element['discovered_by'] . "</p>";
                    echo "<p><strong>Named by:</strong> " . $element['named_by'] . "</p>";
                    echo "</div>";

                    echo "<div class='item-g item'>";
                    echo "7"; 
                    echo "<h1 id='title'>Position in the Periodic Table</h1>";
                    echo "<p><strong>X position:</strong> " . $element['xpos'] . "</p>";
                    echo "<p><strong>Y position:</strong> " . $element['ypos'] . "</p>";
                    echo"</div>";

                    // Image of the element
                    echo "<div class='item-h item'>";
                    echo "8";
                    echo "<h1 id='title'>Image</h1>";
                    // muestra el nombre y url de la imagen
                    echo "<img src='" . $element['image']['url'] . "' alt='Image of " . $element['name'] . "'>";
                    echo "</div>";

                    // Electronic configuration of the element
                    echo "<div class='item-i item'>";
                    echo "<h1 id='title'>Electronic Configuration</h1>";
                    foreach ($element['shells'] as $shell) {
                        echo "<p><strong>Shell:</strong> " . $shell . "</p>";
                    }
                    echo "</div>";


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