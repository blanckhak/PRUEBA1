<?php
// Array para almacenar datos
$data = [];
$startYear = 1995;
$endYear = 2020;
$country = 'PER';

// Iterar entre los años para obtener los datos
for ($year = $startYear; $year <= $endYear; $year++) {
    $url = "https://api.worldbank.org/pip/v1/pip?country={$country}&year={$year}";
    $response = file_get_contents($url);
    $json = json_decode($response, true);
    // Validar si la API devuelve datos
    if (isset($json[0]['headcount'])) {
        $data[] = [
            'year' => $year,
            'headcount' => $json[0]['headcount']
        ];
    }
}

// Convertir los datos a JSON para usarlos en JavaScript
header('Content-Type: application/json');
echo json_encode($data);
?>
