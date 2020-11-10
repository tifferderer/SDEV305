<?php
    ini_set('display_errors,1');
    error_reporting((E_ALL));

/*
 * Tiffany Ferderer
 * 10/19/2020
 * stairs.php
 *
 */

    function stairSteps($numOfSteps)
    {
        //Add space so figure is not against edge
        $bottomStars = numOfSpaces(1) . "***";

        //create a loop for the stick person
        for($i = 0; $i < $numOfSteps; $i++)
        {
            //call function for specific body part
            echo stickPerson($numOfSteps-$i ,"  O  *****", $i );
            echo stickPerson($numOfSteps-$i ," /|\ *    ", $i  );
            echo stickPerson($numOfSteps-$i ," / \ *    ", $i );

            //grow the bottom level of stars based on number of steps
            $bottomStars .= "********";
        }
        //Add a pre tag and print the bottom level stars
        echo "<pre>" . $bottomStars . "</pre>";
    }

    //function to create the stick person based on the body part desired
    function stickPerson($spaces,$body, $stepSpace) {
        return "<pre>" . numOfSpaces($spaces) . $body . numOfSpaces($stepSpace) ."*  </pre>";
    }

    //function for the spacing of the steps
    function numOfSpaces($num) {
        $spaces = "";
        for($i = 0; $i < $num; $i++) {
            $spaces.= "        ";
        }
        return $spaces;
    }
    
    echo stairSteps(4);