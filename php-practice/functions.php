<?php

    function averageOfTwo($num1, $num2)
    {
        $avg = ($num1 + $num2) / 2;
        return $avg;
    }

    //echo "The average is " . averageOfTwo(5,3);

    function circumference($radius)
    {
        $c = 3.14 * (2 * $radius);
        return $c;
    }

    //echo "Circumference " . circumference(2);

    $answer = averageOfTwo(5,3);
    echo "the average is $answer";

    $x=0;
    $y=false;

    if($x == $y) {
        echo "<p> Yes</p>";
    } else {
        echo "<p> No</p>";
    }