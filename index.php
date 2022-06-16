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
    $src = "src";
    $boxShadow = 'style="box-shadow: 20px 40px 40px 20px red"';
    //this is an example to filter in api with object
//print_r($response_data->moves);
}
?>
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
<div class="container-main">
        <div class="header">
            <div><h1>Pokedex</h1></div>
        </div>
        <div class="search">
            <form action="" class="form" method="post">
                    <input type="text" name="poke" id="poke-id" placeholder="Id or name of pokemon!"/>
                    <!--<span class="error">*</*?php if (isset($_POST['poke'])){echo $input_error;}?></span> -->
                    <button type="submit" id="run">Go</button>
            </form>
        </div>
        <div class="features">
            <div class="align-features">
                <div class="align-text-features" <?php if(isset($_POST['poke'])){echo $boxShadow;}?> id="border">
                    <div class="name"><h1><?php
                            if
                            (isset($_POST['poke'])) {
                                echo $nameStr;
                            }?>

                            <?php
                            if
                            (isset($_POST['poke'])) {
                                echo $name;
                            }?>
                        </h1>

                    </div>
                    <div class="id">
                        <h2>
                            <?php
                            if
                            (isset($_POST['poke'])) {
                                echo $idStr;
                            }?>

                            <?php if
                            (isset($_POST['poke'])) {
                                echo $id;
                            } ?>
                        </h2>

                    </div>
                    <div class="moves">
                        <h2>
                            <?php
                            if
                            (isset($_POST['poke'])) {
                                echo $movesStr;
                            }?>

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
                            ?>
                        </h2>
                    </div>
                    <div class="abilities">
                        <h2>
                            <?php
                            if
                            (isset($_POST['poke'])) {
                                echo $abilitiesStr;
                            }?>

                            <?php if
                            (isset($_POST['poke'])) {
                                echo $abilities;
                            }?>
                        </h2>
                    </div>
                </div>
                <div class="images">
                    <div class="sprites">
                        <img <?php if(isset($_POST['poke'])){echo $src;}?> ="<?php
                        if (isset($_POST['poke'])) {
                            echo $pokeImage;
                        }?>">
                    </div>
                </div>
            </div>

        </div>
</div>
</body>
</html>