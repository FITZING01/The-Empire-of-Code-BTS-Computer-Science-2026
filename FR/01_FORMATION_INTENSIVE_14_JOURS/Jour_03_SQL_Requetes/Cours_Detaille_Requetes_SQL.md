# SPRINT 19.5 - Jour 03 : Maîtrise des Requêtes SQL (DML)

Le Syllabus Génie Logiciel & Informatique de Gestion (IGL, GSI...) 2025 met l'accent sur les requêtes imbriquées et la manipulation précise des données. Ce document guide l'élève dans l'écriture de requêtes performantes.

## 1. Filtrage et Unicité (DISTINCT)

Pour éviter les doublons dans les résultats, le mot-clé `DISTINCT` est indispensable.
Exemple : Extraire la liste unique des villes de départ des vols.

## 2. Manipulation de Données (UPDATE / DELETE)

Les mises à jour et suppressions doivent être ciblées. Les conditions peuvent impliquer des jointures ou des sous-requêtes.

```sql
DELETE FROM Vol WHERE DateVol < '2025-03-01' AND NumAv IN (...);
```

## 3. Les Sous-Requêtes (Calculs et Comparaisons)

- **ALL / ANY** : Permettent de comparer une valeur à l'ensemble d'un résultat de sous-requête.
- **AVG / MAX / MIN / SUM** : Fonctions d'agrégation essentielles pour les statistiques de gestion.

Le candidat doit être capable de comparer une ligne individuelle à une métrique globale (par exemple : trouver les salaires supérieurs à la moyenne).

## 4. Les Jointures

Pour relier deux entités (Client et Vente), la jointure SQL est le socle de l'interrogation relationnelle.
