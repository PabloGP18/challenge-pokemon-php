<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>


<?php
//if(isset($_GET['poke'])){
    //$inputData = $_GET["poke"];
//POKEMON API URL
    $api_url = 'https://pokeapi.co/api/v2/pokemon/1';
//$poke_data = json_decode(file_get_contents($api_url), true);
//echo "<pre>";
//print_r($poke_data);

//READ THE JSON FILE
    $json_data = file_get_contents($api_url);

//DECODE JSON DATA INTO PHP ARRAY
    $response_data = json_decode($json_data, true);
    $pokeImage = $response_data['sprites']['front_shiny'];
    echo"<pre>";

//print_r($response_data);
// this is the way to filter in api with array
    print_r($response_data['forms']['0']['name']); echo"<br>";
    print_r($response_data['moves']['0']['move']['name']);echo"<br>";
    print_r($response_data['abilities']['0']['ability']['name']);echo"<br>";
    print_r($response_data['sprites']['front_shiny']);echo"<br>";
    print_r($response_data['id']);



//this is the way to filter in api with object
//print_r($response_data->moves);

//$moves=$response_data->moves;

//for ($i=0; $i<4;$i++){
    //print_r($moves[$i]);

//}
//print_r($response_data->sprites->front_default);

//}

?>

 <img src="<?php echo $pokeImage;?>">

<div class="container-main" >
        <div class="header">
            <div><h1>Pokedex</h1></div>
            <div><img src="Poke-Ball-Gloss_01_Top-View.png" height="50px" width="50px"></div>
        </div>
        <div class="search">
            <form class="form">
                    <input type="text" name="poke" id="poke-id" placeholder="Id or name of pokemon"/>
                    <button type="button" id="run">Go</button>
            </form>
        </div>
        <div class="features">
            <div class="align-features">
                <div class="align-text-features" id="border">
                    <div class="name"></div>
                    <div class="id"></div>
                    <div class="moves"></div>
                    <div class="evolution"></div>
                </div>
                <div class="images">
                    <div class="evoImage2"></div>
                    <div class="sprites"></div>
                    <div class="evoimage3"></div>
                </div>
            </div>

        </div>
</div>
<script src="script.js"></script>
</body>
</html>