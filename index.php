<?php

function getHowManyFalses($array)
{
    $how_many_falses = 0;


    for($i = 0 ; $i < count($array) - 1; $i++) {

        $selected = $array[$i];
        $next = $array[$i + 1]; 

        if($selected < $next) {
            continue;
        } else {
            $how_many_falses++;
        }

    }

    return $how_many_falses;
}

function sorted($array) 
{
    for($i = 0; $i < count($array) - 1; $i++) {
        $atual = $array[$i];
        $next = $array[$i + 1];

        if($atual >= $next) {
            return false;
        }
    }

    return true;
}

function howManyRepetions(array $array)
{
    $repetitions = array_count_values($array);

    return $repetitions;
}

function removeAndTreat($array, $index) 
{
    unset($array[$index]);
    $treated = array_merge(array(), $array);
    return $treated;
}

function check($array) 
{   

    for($i = 0; $i < count($array); $i++) {

        $new = array_merge(array(), $array);
        $new = removeAndTreat($new, $i);

        if(sorted($new)) {
            return true;
        }

    }
    
    return false;

}


function sequenciaCrescente(array $array)
{   
    if(count($array) == 1) {
        return true;
    }

    $how_many_falses = getHowManyFalses($array);
    

    if($how_many_falses >= 2) {
        return false;
    }

    $how_many_repetitions = howManyRepetions($array);

    $result = 0;

    foreach($how_many_repetitions as $rep) {
        
        if($rep >= 3) {
            $result = false;
            break;
        } 
            
        if($rep == 1) {
            continue;
        }

        $result += $rep;

    }

    if($result >= 4 || $result == false && $result != 0) {
        return false;
    }

    return check($array);

}

$testes = [
    [1, 3, 2, 1],
    [1, 3, 2],
    [1, 2, 1, 2],
    [3, 6, 5, 8, 10, 20, 15],
    [1, 1, 2, 3, 4, 4],
    [1, 4, 10, 4, 2],
    [10, 1, 2, 3, 4, 5],
    [1, 1, 1, 2, 3],
    [0, -2, 5, 6],
    [1, 2, 3, 4, 5, 3, 5, 6],
    [40, 50, 60, 10, 20, 30],
    [1, 1],
    [1, 2, 5, 3, 5],
    [1, 2, 5, 5, 5],
    [10, 1, 2, 3, 4, 5, 6, 1],
    [1, 2, 3, 4, 3, 6],
    [1, 2, 3, 4, 99, 5, 6],
    [123, -17, -5, 1, 2, 3, 12, 43, 45],
    [3, 5, 67, 98, 3]
];

foreach($testes as $teste) {

    $sequencia = implode(', ', $teste);

    if(sequenciaCrescente($teste)) {
        echo "[ $sequencia ] true".PHP_EOL;
    } else {
        echo "[ $sequencia ] false".PHP_EOL;
    }

}
