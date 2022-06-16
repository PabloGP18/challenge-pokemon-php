<?php
if (isset($_POST['poke'])) {
    $searchPoke = $_POST['poke'];
    if (empty($searchPoke)) {header("Refresh:0");}
    $api_url = 'https://pokeapi.co/api/v2/pokemon/' . strtolower($searchPoke);

//READ THE JSON FILE
    $json_data = file_get_contents($api_url);
    if (!$json_data){ echo "<h1>No encontre tu pokémon</h1>";return ;}

//DECODE JSON DATA INTO PHP ARRAY
    $response_data = json_decode($json_data, true);
    $pokeImage = $response_data['sprites']['front_shiny'];
    if (!$pokeImage) return;
    // using pre to make api array more visible
    //echo"<pre>";

// this is how to filter in api with array
    $nameStr= "Name:";
    $name = $response_data['forms']['0']['name'];
    $movesStr= "Moves:";
    $moves = $response_data['moves']['0']['move']['name'];
    $abilitiesStr= "Abilities:";
    $abilities = $response_data['abilities']['0']['ability']['name'];
    //$sprites = $response_data['sprites']['other']['home']['front_default'];
    $idStr="Id:";
    $id = $response_data['id'];

//this is an example to filter in api with object
//print_r($response_data->moves);
}


