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
//POKEMON API URLµ
if (isset($_POST['poke'])) {

    //var_dump($_POST);
    //var_dump($_GET);
    $searchPoke = $_POST['poke'];
    $api_url = 'https://pokeapi.co/api/v2/pokemon/' . $searchPoke;

//$poke_data = json_decode(file_get_contents($api_url), true);
//echo "<pre>";
//print_r($poke_data);

//READ THE JSON FILE
    $json_data = file_get_contents($api_url);

   // print_r($json_data);

    if(!$json_data) return;

//DECODE JSON DATA INTO PHP ARRAY
    $response_data = json_decode($json_data, true);
    $pokeImage = $response_data['sprites']['front_shiny'];
    if(!$pokeImage) return;
    echo"<pre>";

//print_r($response_data);
// this is the way to filter in api with array

    $name = $response_data['forms']['0']['name'];
    $moves = $response_data['moves']['0']['move']['name'];
    $abilities = $response_data['abilities']['0']['ability']['name'];
    $sprites = $response_data['sprites']['front_shiny'];
    $id = $response_data['id'];
    //print_r($response_data['forms']['0']['name']); echo"<br>";
    //print_r($response_data['moves']['0']['move']['name']);echo"<br>";
    //print_r($response_data['abilities']['0']['ability']['name']);echo"<br>";
    //print_r($response_data['sprites']['front_shiny']);echo"<br>";
    //print_r($response_data['id']);



//this is the way to filter in api with object
//print_r($response_data->moves);

//$moves=$response_data->moves;

//for ($i=0; $i<4;$i++){
    //print_r($moves[$i]);

//}
//print_r($response_data->sprites->front_default);

//}

}

?>

<div class="container-main" >
        <div class="header">
            <div><h1>Pokedex</h1></div>
        </div>
        <div class="search">
            <form action="" class="form" method="post">
                    <input type="text" name="poke" id="poke-id" placeholder="Id or name of pokemon"/>
                    <button type="submit" id="run">Go</button>
            </form>

            <?php if (isset($_POST['poke'])) {
             echo $name;}?> <br>

            <?php
                if (isset($_POST['poke'])) {

                    if (count($response_data['moves']) > 1 ){
                        for ($i=0; $i<=4;$i++){
                            print_r($response_data['moves'][$i]['move']['name']);
                        }
                    } else if (count($response_data['moves']) === 1){
                            print_r($response_data['moves']['0']['move']['name']);
                    }

                }
            ?> <br>
            <?php if (isset($_POST['poke'])) {echo $abilities;}?> <br>

            <?php if (isset($_POST['poke'])) {echo $id;} ?> <br>

            <img src ="<?php
            if (isset($_POST['poke'])) {
                echo $pokeImage;
            }?>">



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