<?php

function capitalizeFirstLetter($string) {

    if (empty($string)) {
        return $string;
    }

    $firstLetter = strtoupper(substr($string, 0, 1));
    $restOfString = substr($string, 1);
    $capitalizedString = $firstLetter . $restOfString;
    return $capitalizedString;
}

function returnInitial($string) {

    if (!empty($string)) {

        $initial = capitalizeFirstLetter(substr($string, 0, 1));
        

        $result = $initial . ".";
        
        return $result;
    } else {

        return "";
    }
}

?>