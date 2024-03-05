<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <h1>Periodic <code>Table</code></h1>


    <div class="buttons">
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <button type="submit" name="category" value="diatomic_nonmetal" class="raise diatomic_nonmetal">Diatomic
                Nonmetal</button>
            <button type="submit" name="category" value="noble_gas" class="raise noble_gas">Noble Gas</button>
            <button type="submit" name="category" value="alkali_metal" class="raise alkali_metal">Alkali
                Metal</button>
            <button type="submit" name="category" value="alkaline_earth_metal"
                class="raise alkaline_earth_metal">Alkaline
                Earth Metal</button>
            <button type="submit" name="category" value="metalloid" class="raise metalloid">Metalloid</button>
            <button type="submit" name="category" value="polyatomic_nonmetal"
                class="raise polyatomic_nonmetal">Polyatomic
                Nonmetal</button>
            <button type="submit" name="category" value="post-transition_metal"
                class="raise post-transition_metal">Post-transition Metal</button>
            <button type="submit" name="category" value="transition_metal" class="raise transition_metal">Transition
                Metal</button>
            <button type="submit" name="category" value="lanthanide" class="raise lanthanide">Lanthanide</button>
            <button type="submit" name="category" value="actinide" class="raise actinide">Actinide</button>
            <button type="submit" name="category" value="unknown" class="raise unknown">unknown</button>

            <button typer="submit" name="category" value="reset" class="raise reset">Reset</button>
        </form>
    </div>

    <main>
        <?php
        if (isset($_GET['category'])) {
            $filterCategory = $_GET['category'];
        } else {
            $filterCategory = "";
        }
        $url = 'https://raw.githubusercontent.com/Bowserinator/Periodic-Table-JSON/master/PeriodicTableJSON.json';

        $data = file_get_contents($url);
        $array = json_decode($data, true);
        if (!$array) {
            echo "No hay datos o hay un error en la decodificación del JSON.";
        } else {
            echo "<div class ='periodic'>";
            foreach ($array['elements'] as $element) {
                $category = str_replace(' ', '_', $element["category"]);
                if (str_contains($category, "unknown")) {
                    $category = "unknown";
                }
                if ($filterCategory == "") {
                    $isCategoryMatch = true;
                } else {
                    $isCategoryMatch = $filterCategory != "" && $filterCategory == $category || $filterCategory == "reset";
                }
                $elementClass = $isCategoryMatch ? 'element ' . $category : 'element null';

                if ($element['number'] >= 58 && $element['number'] <= 71) {
                    echo "<a class='lantanides' href='element.php?elemento=" . $element['name'] . "''>";
                    echo "<div class='$elementClass'>";
                    echo "<div class='at_num'>" . $element['number'] . "</div>";
                    echo "<div class='symbol " . $element['phase'] . "'>" . $element['symbol'] . "</div>";
                    echo "<div class='at_details'>" . $element['name'] . "</div>";
                    echo "<div class='at_number'>" . $element['atomic_mass'] . "</div>";

                    echo "</div>";

                    echo "</a>";
                } else if ($element['number'] >= 90 && $element['number'] <= 103) {
                    echo "<a class='actinides' href='element.php?elemento=" . $element['name'] . "''>";
                    echo "<div class='$elementClass'>";
                    echo "<div class='at_num'>" . $element['number'] . "</div>";
                    echo "<div class='symbol " . $element['phase'] . "'>" . $element['symbol'] . "</div>";
                    echo "<div class='at_details'>" . $element['name'] . "</div>";
                    echo "<div class='at_number'>" . $element['atomic_mass'] . "</div>";

                    echo "</div>";

                    echo "</a>";
                } else {
                    echo "<a class='cell' href='element.php?elemento=" . $element['name'] . "''>";
                    echo "<div class='$elementClass'>";
                    echo "<div class='at_num'>" . $element['number'] . "</div>";
                    echo "<div class='symbol " . $element['phase'] . "'>" . $element['symbol'] . "</div>";
                    echo "<div class='at_details'>" . $element['name'] . "</div>";
                    echo "<div class='at_number'>" . $element['atomic_mass'] . "</div>";
                    echo "</div>";

                    echo "</a>";
                }
            }

            echo "</div>";
        }
        ?>

        </div>
    </main>
</body>

</html>