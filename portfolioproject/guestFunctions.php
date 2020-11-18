<?php

//echo "<p> Loaded </p>";

function validInfo($info)
{
    return !empty($info) //&& ctype_alpha($name)
        ;
}

//Validate greetings: array of greetings
function validGreet($selectedGreeting) {
    $validGreetings = array("new", "hiring", "meetup", "other");

    //check each greeting and return false if not valid
        if(!in_array($selectedGreeting, $validGreetings)) {
            return false;
        }

    //ALL toppings valid
    return true;
}
