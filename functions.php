<?php

function double(int $number): int {
    return $number * 2;
}

function times(int $number1, int $number2): int {
    return $number1 * $number2;
}

function doubleArray(array $array): array {
    // Créer un nouveau tableau
    $result = [];
    // Pour chaque élément du tableau reçu en paramètre
    foreach ($array as $number) {
        // Multiplier cet élément par 2
        $number = $number * 2;
        // Stocker le résultat dans le nouveau tableau
        array_push($result, $number);
    }
    // Renvoyer le nouveau tableau
    return $result;
}
