
Kata 01
=======

Bienvenue sur ce premier exercice

> Cette mini application affiche en json la liste des biens en vente pour l'entreprise indiquée en variable d'environnement.

Votre mission, si vous l'acceptez, sera :

- ne pas toucher au contenu du dossier "data"
- rendre ce code testable
- refactoriser le nécessaire, et y'a du nécessaire !
- prendre en compte le nouveau besoin ci-dessous
- pousser le code finalisé sur une branche portant vos prénoms

Installation
------------

```bash
$> git clone git@github.com:FredSafti/kata01
$> cd kata01
$> composer install
```

Lancer les tests
---------------- 

```bash
$> vendor/bin/phpunit
```

Nouveau besoin
--------------

Pour l'entreprise **SAFTI uniquement**, il faudrait que la liste des biens soit issue du webservice suivant, au lieu de la lecture dans le fichier csv local :

http://omega.dev.safti.local/Git/Frederic/kata01-api/biens.csv
