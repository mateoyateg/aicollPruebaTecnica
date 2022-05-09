<?php

//Cargar los datos de la api al inicio de la aplicacion

$numResultados = 12;
$url = "https://randomuser.me/api/?nat=us&results=" . $numResultados;
$json = file_get_contents($url);
$datosAPI = json_decode($json, true);

//Array vacio
$data = [];

for ($i = 0; $i < $numResultados; $i++) {

    $data[$i][] = $datosAPI["results"][$i]["id"]["name"]; //0
    $data[$i][] = $datosAPI["results"][$i]["id"]["value"]; //1
    $data[$i][] = $datosAPI["results"][$i]["name"]["first"]; //2
    $data[$i][] = $datosAPI["results"][$i]["name"]["last"]; //3
    $data[$i][] = $datosAPI["results"][$i]["location"]["street"]["number"]; //4
    $data[$i][] = $datosAPI["results"][$i]["location"]["street"]["name"]; //5
    $data[$i][] = $datosAPI["results"][$i]["location"]["city"]; //6
    $data[$i][] = $datosAPI["results"][$i]["location"]["postcode"]; //7
    $data[$i][] = $datosAPI["results"][$i]["location"]["coordinates"]["latitude"]; //8
    $data[$i][] = $datosAPI["results"][$i]["location"]["coordinates"]["longitude"]; //9
    $data[$i][] = $datosAPI["results"][$i]["email"]; //10
    $data[$i][] = $datosAPI["results"][$i]["login"]["username"]; //11
    $data[$i][] = $datosAPI["results"][$i]["login"]["password"]; //12
    $data[$i][] = $datosAPI["results"][$i]["dob"]["age"]; //13
    $data[$i][] = $datosAPI["results"][$i]["picture"]["large"]; //14
    $data[$i][] = $datosAPI["results"][$i]["gender"]; //15
    $data[$i][] = $datosAPI["results"][$i]["phone"]; //16

    /*echo "<tr>";

    for ($j = 0; $j < count($data[$i]); $j++) {
        echo " <td> " . $data[$i][$j] . "</td>";
    }

    echo "</tr>";*/
}

?>