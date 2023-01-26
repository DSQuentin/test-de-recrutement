# Test - Code smells

Refactorisez les codes en expliquant votre résonnement en commentaire (2 jours) :

- 3 exos PHP
- 1 exo JS
- 1 exo SCSS

PS : nous ne cherchons pas le code parfait, nous voulons évaluer votre capacité à réfléchir et solutionner un problème

# Explications :

## PHP

### Easy :

Plutot que de faire une vérification pour chaque unité, on peut faire une boucle
qui va vérifier si la valeur est supérieure à 1024, et si oui, on divise par 1024
et on incrémente l'index de l'unité, et ce tant que la valeur est supérieure ou égale à 1024
ou que l'index de l'unité est inférieur à la taille du tableau - 1.
Puis on utilise round pour arrondire le résultat à la précision voulue.

### Medium :

Dans la méthode `receive()`, je remplace la série de if/else par un tableau associatif nommé `directions`. <br/>
Ce tableau associe la direction du rover à un tableau contenant les deux directions possibles
soit la gauche ou la droite. <br/>
Je remplace aussi la série de if/else par un tableau associatif nommé `movement`
ce qui permet d'associer la direction du rover à un tableau contenant les coordonnées
sur les axes x et y. <br/>
Enfin je remplace la dernière série de if/else qui détermine le déplacement
du rover par un opérateur ternaire qui vérifie la direction actuelle du rover
et multiplie la direction par 1 ou -1 selon la direction du rover.

### Hard :

Pour refactoriser ce code, j'ai tout d'abord extrait le calcul du Rental présent dans la méthode
statement de la class `Customer` dans une méthode séparé, nommé `calculateRentalAmount()`
que j'ai placé dans la class `Movie` afin de le rendre plus lisible et modulable. <br/>
Puis j'ai refactorisé le switch en créant une méthode dans la class `Movie` qui calcule
le Rental pour un film spécifique, méthode que j'appelle dans `calculateRentalAmount()`. <br/>
Enfin, la méthode qui retourn le titre d'un film peut être placée dans la class `Rental`
afin que la class `Customer` n'ait pas de référence direct a un film. <br/>
Ces modifications permettent de faciliter les changements ou ajouts à logique sans affecter le reste du code.

## JavaScript

Pour améliorer ce code, j'ai effectué quelques petits changements. <br/>
Tout d'abord j'ai changé la variable `kudos` en `maxKudos` afin d'indiqué que cela
représente le nombre maximal de kudos donnés dans chaque Article, plutot que le nombre
total de kudos de tous les articles. Cela me parrait plus clair. <br/>
Puis j'ai changé la variable `kudos`en `totalKudos` présent dans la fonction `calculateTotalKudos()` afin de mieux représenter le nombre total de kudos présents dans tous les articles, plutôt que le nombre donné dans un seul article. C'est le raisonnement inverse que pour le changement précédent. <br/>
Le résultat de `calculateTotalKudos()` a été mis dans une variable, puis utilisé dans `document.write(...)` plutot que d'appeler la fonction dedans.<br>
Ces petits changements rendent le code bien plus compréhensible.

## SCSS

Pour les changements apportés au fichier `footer.scss` , j'ai tout simplement appliqué la syntaxe de sccs afin de le rendre plus lisible et compréhensible. <br>
