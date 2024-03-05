<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Element Information</title>
    <link rel="stylesheet" href="element.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

</head>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

<body>
    <header>

        <a href="index.php" id="icon"><img src="img/atras.png" alt="Back icon"> Back</a> <!-- Back button -->
        <a href="#basicInfo" id="icon"> <img src="img/iconColor1.png" alt="Info icon"> Basic Information</a> <!-- Basic Information / item b-->
        <a href="#summary" id="icon"><img src="img/iconColor2.png" alt="Summary icon"> Summary</a> <!-- Summary / item c-->
        <a href="#physical" id="icon"><img src="img/iconColor3.png" alt="Physical icon"> Physical</a> <!-- Physical / item d-->
        <a href="#chemical" id="icon"><img src="img/iconColor4.png" alt="Chemical icon"> Chemical</a> <!-- Chemical / item e-->
        <a href="#discovery" id="icon"><img src="img/iconColor5.png" alt="Discovery icon"> Discovery and Named</a> <!-- Discovery and Named / item f-->
        <a href="#position" id="icon"><img src="img/iconColor6.png" alt="Position icon"> Position in the Periodic Table</a> <!-- Position in the Periodic Table / item g-->
        <a href="#image" id="icon"><img src="img/iconColor7.png" alt="Image icon"> Image</a> <!-- Image / item h-->
        <a href="#electronic" id="icon"><img src="img/iconColor8.png" alt="Electronic icon"> Electronic Configuration</a> <!-- Electronic Configuration / item i-->

    </header>

    <?php
    if (isset($_GET['elemento'])) {
        $elementName = $_GET['elemento'];
        $url = 'https://raw.githubusercontent.com/Bowserinator/Periodic-Table-JSON/master/PeriodicTableJSON.json';

        $data = file_get_contents($url);
        $array = json_decode($data, true);

        echo "<div class='container'>";
        // if ($array){
        //     foreach ($array['elements'] as $element) {
        //         if ($element['name'] === $elementName) { 
        //             echo "<div class='model'>";
        //             echo "<model-viewer src='" . $element['bohr_model_3d'] . "' ar ar-modes='webxr scene-viewer quick-look' camera-controls tone-mapping='commerce' poster='poster.webp' shadow-intensity='2' autoplay> </model-viewer> ";
        //             echo "</div>";
        //         }
        //     }
        // } else {
        //     echo "No hay datos o hay un error en la decodificación del JSON.";
        // }
        echo "<div class='grid'>";

        if (!$array) {
            echo "No hay datos o hay un error en la decodificación del JSON.";
        } else {
            foreach ($array['elements'] as $element) {
                if ($element['name'] === $elementName) {
                    echo "<div class='item-a item'>";
                    echo "<div class='title-icon'><h1>" . $element['number'] . "</h1></div>";
                    echo "<div class='title-symbol'><h1>" . $element['symbol'] . "</h1></div>";
                    echo "<div class='title-text'><h1>" . $element['name'] . "</h1></div>";
                    echo "<div class='title-mass'><h1>" . $element['atomic_mass'] . "</h1></div>";
                    echo "</div>";

    ?>
                    <div class='item-b item' id='basicInfo'>

                        <h1 id='title'>Basic information</h1>

                        <table>
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td><?php echo $element['name']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Atomic Number:</strong></td>
                                <td><?php echo $element['number']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Atomic Mass:</strong></td>
                                <td><?php echo $element['atomic_mass']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Appearance:</strong></td>
                                <td><?php echo $element['appearance']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Category:</strong></td>
                                <td><?php echo $element['category']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Period:</strong></td>
                                <td><?php echo $element['period']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Group:</strong></td>
                                <td><?php echo $element['xpos']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                    echo "<div class='item-c item' id='summary'>";
                    // modelo 3d
                    echo "<h1>Summary</h1>";
                    echo "<p><strong>Phase:</strong> " . $element['summary'] . "</p>";
                    // modelo 3d
                    echo "<div class='model'>";
                    echo "<model-viewer src='" . $element['bohr_model_3d'] . "' ar ar-modes='webxr scene-viewer quick-look' camera-controls tone-mapping='commerce' poster='poster.webp' shadow-intensity='2' autoplay> </model-viewer> ";
                    echo "</div>";
                    echo "</div>";
                    ?>
                    <div class='item-d item' id='physical'>
                        <div class='title-container'>
                            <h1>Physical</h1>
                        </div>
                        <div class="scroll">
                            <table>
                                <tr>
                                    <td><strong>Apparience:</strong></td>
                                    <td><?php echo $element['appearance']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Density:</strong></td>
                                    <td><?php echo $element['density']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Phase:</strong></td>
                                    <td><?php echo $element['phase']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Boiling Point:</strong></td>
                                    <td><?php echo $element['boil']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Melting Point:</strong></td>
                                    <td><?php echo $element['melt']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Electron Affinity:</strong></td>
                                    <td><?php echo $element['electron_affinity']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Ionization Energy:</strong></td>
                                    <td><?php echo $element['molar_heat']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class='item-e item' id='chemical'>
                        <div class='title-container'>
                            <h1>Chemical</h1>
                        </div>
                        <div class="scroll">
                            <table>
                                <tr>
                                    <td><strong>Atomic Mass:</strong></td>
                                    <td><?php echo $element['atomic_mass']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Electron Configuration:</strong></td>
                                    <td><?php echo $element['electron_configuration']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Semantic Electron:</strong></td>
                                    <td><?php echo $element['electron_configuration_semantic']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Electron Affinity:</strong></td>
                                    <td><?php echo $element['electron_affinity']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Electronegativity:</strong></td>
                                    <td><?php echo $element['electronegativity_pauling']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Ionization Energy:</strong></td>
                                    <td>
                                        <div class="scroll">
                                            <table>
                                                <?php
                                                foreach ($element['ionization_energies'] as $energy) {
                                                    echo "<tr><td>$energy</td></tr>";
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class='item-f item' id='discovery'>
                        <div class='title-container'>
                            <h1>Discovery and Named</h1>
                        </div>
                        <div class="scroll2">
                            <table>
                                <tr>
                                    <td><strong>Discovered by:</strong></td>
                                    <td><?php echo $element['discovered_by']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Named by:</strong></td>
                                    <td><?php echo $element['named_by']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class='item-g item' id='position'>
                        <div class='title-container'>
                            <h1>Position in the Periodic Table</h1>
                        </div>
                        <table>
                            <tr>
                                <td><strong>X position:</strong></td>
                                <td><?php echo $element['xpos']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Y position:</strong></td>
                                <td><?php echo $element['ypos']; ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class='item-h item' id='image'>
                        <div class='title-container'>
                        </div>
                        <img src='<?php echo $element['image']['url']; ?>' alt='Image of <?php echo $element['name']; ?>'>
                    </div>

                    <div class='item-i item' id='electronic'>
                        <div class='title-container'>
                            <h1>Electronic Configuration</h1>
                        </div>
                        <div class="scroll3">
                            <table>
                                <?php
                                foreach ($element['shells'] as $shell) {
                                    echo "<tr><td><strong>Shell:</strong></td><td>$shell</td></tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
    <?php
                }
            }
        }
    }


    echo "</div>";
    echo "</div>";
    ?>