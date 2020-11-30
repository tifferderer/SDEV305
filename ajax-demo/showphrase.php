<?php

    //var_dump($_POST);

    $adjs = array('funny', 'smart',);
    $names = array('Jojo', 'Alex');

    //get name from post aray
    $name = $_POST['name'];

    //if name is empty, grab random name
    if(empty($name)) {
        $name = $names[rand(0, count($names)-1)];
    }

    //get a random name and adjective
    $adj = $adjs[rand(0, count($adjs)-1)];


    //display message
    echo "$name is $adj";
