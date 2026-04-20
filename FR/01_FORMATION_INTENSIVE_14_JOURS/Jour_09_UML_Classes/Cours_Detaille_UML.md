# SPRINT 19.5 - Jour 09 : Modélisation de Données (UML Classes)

Le diagramme de classes est l'épine dorsale de la modélisation objet. Il définit la structure statique du système.

## 1. Concepts Clés : Classes et Attributs

Pour la **Bibliothèque en ligne**, nous modélisons les entités métier :
- **Abonné** : Porte les informations de l'utilisateur. Ses méthodes (`emprunterLivre`, `payerAmende`) traduisent ses capacités d'action.
- **Livre** : Représente la ressource. L'attribut `estDisponible` est crucial pour la logique métier.
- **Emprunt** : Classe pivot qui matérialise l'interaction entre l'Abonné et le Livre. Elle enregistre la temporalité (dates de retour).

## 2. Gestion des Retards et Amendes

La complexité métier réside dans le lien entre l'Emprunt et l'Amende.
- **Association 1 à 0..1** : Un emprunt peut générer une amende au maximum (si le retour est en retard).
- **Logique de calcul** : La méthode `calculerAmende()` de la classe Emprunt calcule le montant dû en fonction des jours de retard.

## 3. Cardinalités (Multiplicités)

- Un **Abonné** peut effectuer plusieurs emprunts (`1..*`).
- Un **Livre** peut être l'objet de plusieurs emprunts historiques (`1..*`), bien qu'il ne puisse être emprunté physiquement qu'une fois à un instant T (géré par `estDisponible`).
- Un **Emprunt** concerne exactement un livre et un abonné.

Cette rigueur dans les associations garantit une implémentation Java ou SQL sans erreur de conception.

