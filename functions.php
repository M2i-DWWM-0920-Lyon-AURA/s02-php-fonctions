<?php

function double(int $number): int {
    return $number * 2;
}

function times(int $number1, int $number2): int {
    return $number1 * $number2;
}

function doubleArray(array $array): array {
    // Crée un nouveau tableau
    $result = [];
    // Pour chaque élément du tableau reçu en paramètre
    foreach ($array as $number) {
        // Multiplie cet élément par 2
        $number = $number * 2;
        // Stocker le résultat dans le nouveau tableau
        array_push($result, $number);
    }
    // Renvoie le nouveau tableau
    return $result;
}

function customInArray($array, $item) {
    // Pour chaque élément du tableau
    foreach ($array as $arrayItem) {
        // Si cet élément est le même que l'élément recherché
        if ($item === $arrayItem) {
            // Interrompt la fonction et renvoie vrai
            return true;
        }
    }
    // Si on arrive à ce point de l'algorithme, c'est que le tablreau
    // entier a été parcouru et donc que la valeur recherchée
    // n'a été trouvée nulle part

    // Interrompt la fonction et renvoie faux
    return false;
}

function parseAction(string $command): ?array {
    // Si la commande est vide
    if (empty($command)) {
        // Interrompt la fonction et renvoie null
        return null;
    }
    // Renvoie un tableau correspondant au découpage de la commande
    // par espaces
    return explode(' ', $command);
}

function isPasswordStrong(string $password): bool {
    // Si le mot de passe contient au moins 8 caractères
    // et qu'il contient au moins un chiffre
    if (strlen($password) >= 8 && preg_match('/\d/', $password)) {
        // Interrompt la fonction et renvoie vrai
        return true;
    }
    // Interrompt la fonction et renvoie faux
    return false;
}

function getPasswordStrength(string $password): string {
    // Initialise le score à 0
    $score = 0;
    // Si le mot de passe contient au moins 8 caractères
    if (strlen($password) >= 8) {
        // Ajoute 1 au score

        // Cette écriture est équivalente aux écritures suivantes:
        // $score = $score + 1;
        // $score += 1;
        $score ++;
        // Si le mot de passe contient au moins 13 caractères
        if (strlen($password) >= 13) {
            // Ajoute 1 au score
            $score ++;
        }
    }
    // Si le mot de passe contient au moins un chiffre
    if (preg_match('/\d/', $password)) {
        // Ajoute 1 au score
        $score ++;
    }
    // Si le mot de passe contient au moins une majuscule
    if (preg_match('/[A-Z]/', $password)) {
        // Ajoute 1 au score
        $score ++;
    }

    // En fonction de la valeur du score, renvoyer la chaîne de
    // caractères correspondante
    switch ($score) {
        case 0:
            return 'Trop faible';
        case 1:
            return 'Faible';
        case 2:
            return 'Moyen';
        case ($score >= 3):
            return 'Fort';
        // Si on ne se trouve dans aucun des cas prévus ci-dessus
        default:
            return 'Score non prévu';
    }
}
