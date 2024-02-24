<?php

$url = "https://duckduckgo-duckduckgo-zero-click-info.p.rapidapi.com/?q=John&callback=process_duckduckgo&no_html=1&no_redirect=1&skip_disambig=1&format=json";

$options = [
    "http" => [
        "header" => "X-RapidAPI-Host: duckduckgo-duckduckgo-zero-click-info.p.rapidapi.com\r\n" .
                    "X-RapidAPI-Key: 4905e898b1mshbef56d1d6e57437p18523ejsn2253eea8382f"
    ]
];

$context = stream_context_create($options);

$response = file_get_contents($url, false, $context);

if ($response === false) {
    echo "Error al obtener los datos.";
} else {
    // Buscar la posición de la primera llave '{' y la última '}'
    $start = strpos($response, '{');
    $end = strrpos($response, '}') + 1;

    // Extraer el contenido JSON
    $jsonContent = substr($response, $start, $end - $start);

    // Decodificar el JSON
    $jsonResponse = json_decode($jsonContent, true);

    if (!$jsonResponse || !isset($jsonResponse['Abstract'])) {
        echo "Error al decodificar el JSON o propiedad 'Abstract' no encontrada.";
    } else {
foreach($jsonResponse as $key => $value){
    echo $key . " : " . $value . "<br>";
}
    }
}
?>