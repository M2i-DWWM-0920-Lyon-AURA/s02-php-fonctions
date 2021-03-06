# Algorithmique - les fonctions

L'objectif de cet exercice est d'écrire pour chaque cas, la fonction qui répond aux spécifications données. La page _index.php_ te proposera une série de tests te permettant de valider ton travail. Tu peux écrire tes fonctions dans le fichier _functions.php_. Attention, chaque fonction doit avoir le nom exact de l'énoncé, sinon elle ne sera pas reconnue.

## Fonction `double`

**Entrée**: un nombre => **Sortie**: le double de ce nombre.

## Fonction `times`

**Entrée**: deux nombres => **Sortie**: le produit de ces deux nombres.

## Fonction `doubleArray`

**Entrée**: un tableau de nombres => **Sortie**: un tableau avec le double de chaque nombre.

## Fonction `customInArray`

**Entrée**: un tableau et un élément => **Sortie**: `true` si le tableau contient l'élément donné, `false` sinon.

> Note: cette fonction reproduit le comportement de la fonction PHP native `in_array`, il s'agit de trouver comment la coder soi-même!

## Fonction `parseAction`

**Entrée**: une chaîne de caractères de forme "verbe sujet" => **Sortie**: un tableau contenant ["verbe", "sujet"].

## Fonction `sumArray`

**Entrée**: un tableau de nombres => **Sortie**: la somme de tous les nombres dans le tableau.

## Fonction `isPasswordStrong`

**Entrée**: une chaîne de caractères représentant un mot de passe => **Sortie**: `vrai` si la chaîne de caractères fait au moins 8 caractères et contient au moins un chiffre, `faux` sinon.

## Fonction `getPasswordStrength`

**Entrée**: une chaîne de caractères représentant un mot de passe => **Sortie**: une chaîne de caractère représentant le niveau de sécurité du mot de passe, en fonction d'un nombre de points. 0 = "Trop faible", 1 = "Faible", 2 = "Moyen", 3 = "Fort. Si le mot de passe fait au moins 8 caractères: +1 point. Si le mot de passe fait au moins 13 caractères: encore +1 point. Si le mot de passe contient au moins un chiffre: +1 point. Si le mot de passe contient au moins une majusucle: +1 point.
